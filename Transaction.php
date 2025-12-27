<?php
// require "Income.php";
#class Transaction
class Transaction {
    // Visibilité (Access Modifiers) && attribute(proprieté)
    protected int $id;
    protected int $user_id;
    protected Category $category;
    protected float $amount;
    protected string $description; 
    protected string $date; 
    
    #methode magic
    public function __construct(int $id, int $user_id,Category $category,float $amount,string $description,string $date){
        $this->id = $id;
        $this->user_id = $user_id;
        $this->category = $category;
        $this->amount = $amount;
        $this->description = $description;
        $this->date = $date;
    }

    #### methode d'héritage Income && Expense
    public function getByID($table,$pdo) : array{
        $sql = "SELECT * FROM $table WHERE user_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $this->user_id,
        ]);
        $income = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // if ($income === false) {
        //     return NULL;
        // }
        return $income;
    }

    //insertion income ou expense
    public function getByCategory(string $table,PDO $pdo) : ?array{
        $sql = "SELECT * FROM $table WHERE user_id = ? AND category_name = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $this->user_id,
            $this->category->category_name,
        ]);
        $table_filtre = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($table_filtre === false) {
            return NULL;
        }
        return $table_filtre;

    }

    public function update(string $table,PDO $pdo){
        $sql = "UPDATE $table SET category_name = ?, montants = ?, description = ?, date = ? WHERE user_id = ? AND id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $this->category->category_name,
            $this->amount,
            $this->description,
            $this->date,
            $this->user_id ,
            $this->id,
    ]);
    }

    public function delete(string $table,PDO $pdo){
        $sql = "DELETE FROM $table  WHERE id = ? AND user_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $this->id,
            $this->user_id ,
        ]);
    }

    public function somme(string $table,PDO $pdo) : ?float{
        $sql = "SELECT SUM(montants) as total FROM $table WHERE user_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $this->user_id ,
        ]);
        $total = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($total === false) {
            return NULL;
        }
        return $total["total"];
    }

}