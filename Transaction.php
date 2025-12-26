<?php
#class Transaction
class Transaction {
    // Visibilité (Access Modifiers) && attribute(proprieté)
    protected $id;
    protected $category_name;
    protected $amount;
    protected $description; 
    protected $created_at;
    
    #### methode d'héritage
    public function __construct($category_name,$amount,$descriotion,){
        $this->category_id = $categ;
        $this->amount = $amoun;
        $this->description = $desc;
    }
    public function getByID($id){}
    public function getByCategory($category_id){}
    public function update($id){}
    public function delete($id){}
}