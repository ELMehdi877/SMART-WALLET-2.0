<?php
// require "Income.php";
#class Transaction
class Transaction {
    // Visibilité (Access Modifiers) && attribute(proprieté)
    protected $user_id;
    protected $category_name;
    protected $amount;
    protected $description; 
    
    #methode magic
    public function __construct($user_id,$category_name,$amount,$descriotion){
        $this->user_id = $user_id;
        $this->category_name = $category_name;
        $this->amount = $amount;
        $this->description = $descriotion;
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
    public function getByCategory($table,$user_id){
        $sql = "SELECT * FROM $table WHERE user_id = ? AND category_name = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->exectute([
            $table,
            $this->user_id,
            $this->category_name,
        ]);
    }
    public function update($id){

    }
    public function delete($id){}
}