<?php 
class Category{
    // Visibilité (Access Modifiers) && attribute(proprieté)

    private $id;
    private $category_name;
    private $created_at;

    ### composition de category avec (income ,expense)
    
    //tableau contient tous les incomes pour category
    private $incomes = [];

    //tableau contient tous les expenses pour category
    private $expenses = [];
    
    //conction 
    public function create($name){}
    public function getAll($id){}

    #### methode composition pour ajouter les objets ($category , $income , $expense) à la fin de ces tableau 
    
    //fonction d'ajouter un objet $income a son tableau incomes
    public function addIncome(Incomes $income){
        $this->incomes[] = $income;
    }

    //fonction d'ajouter un objet $expense a son tableau expenses
    public function addExpense(Expenses $expense){
        $this->expenses[] = $expense;
    }
}