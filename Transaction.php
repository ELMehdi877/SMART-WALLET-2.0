<?php
// require "Income.php";
#class Transaction
class Transaction {
    // Visibilité (Access Modifiers) && attribute(proprieté)
    protected $id;
    protected $user_id;
    protected $category_name;
    protected $amount;
    protected $description; 
    protected $date; 
    
    #methode magic
    public function __construct($id,$user_id,$category_name,$amount,$descriotion,$date){
        $this->id = $id;
        $this->user_id = $user_id;
        $this->category_name = $category_name;
        $this->amount = $amount;
        $this->description = $descriotion;
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
    public function getByCategory($table,$user_id){
        $sql = "SELECT * FROM $table WHERE user_id = ? AND category_name = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->exectute([
            $table,
            $this->user_id,
            $this->category_name,
        ]);
    }
    public function update(string $table,PDO $pdo){
        $sql = "UPDATE $table SET category_name = ?, montants = ?, description = ?, date = ? WHERE user_id = ? AND id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $this->category_name,
            $this->amount,
            $this->description,
            $this->date,
            $this->user_id ,
            $this->id,
    ]);
    }
    public function delete($id){}
}