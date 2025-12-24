<?php
class user{
    // Visibilité (Access Modifiers) && attribute(proprieté)
    private $id;
    private $fullname;
    private $email;
    private $password;

    ### composition de user avec (category , income ,expense)

    //tableau contient tous les categories de l'utilisateur
    private $categories = [];

    //tableau contient tous les incomes de l'utilisateur
    private $incomse = [];

    //tableau contient tous les expenses de l'utilisateur
    private $expenses = [];

    //fonction pour remplie les proprieté
    public function __construct($full_name,$em_ail,$pass_word){
        $this->fullname = $full_name;
        $this->email = $em_ail;
        $this->password = password_hash($pass_word,PASSWORD_DEFAULT);
    }

    //fonction pour inseré les donnés sur database
    public function register(){}

    //fonction pour verifier l'utilisateur existe
    public function login($email,$password){}

    //fonction return les information d'utilisateurs
    public function getByID($id){}

    #### methode composition pour ajouter les objets ($category , $income , $expense) à la fin de ces tableau

    //fonction de ajouter un objet $category a sont tableau categories
    public function addCategory(Category $category){
        $this->categories[] = $category;
    }

    //fonction de ajouter un objet $income a sont tableau incomes
    public function addincome(Income $incomse){
        $this->incomes[] = $income;
    }

    //fonction de ajouter un $expense a sont tableau expenses
    public function addexpense(Expense $expense){
        $this->expenses[] =$expense;
    }
}




class category{
    // Visibilité (Access Modifiers) && attribute(proprieté)

    private $id;
    private $category_name;
    private $created_at;

    ### composition de category avec (income ,expense)
    
    //tableau contient tous les incomes pour category
    private $incomse = [];

    //tableau contient tous les expenses pour category
    private $expenses = [];
    
    //conction 
    private function create($name){}
    private function getAll($id){}

    #### methode composition pour ajouter les objets ($category , $income , $expense) à la fin de ces tableau 
    
    //fonction d'ajouter un objet $income a son tableau incomes
    public function addIncome(incomes $income){
        $this->incomes = $income;
    }

    //fonction d'ajouter un objet $expense a son tableau expenses
    public function addExpense(expenses $expense){
        $this->expenses = $expense;
    }
}

class incomes{
    private $id;
    protected $amount;
    protected $description;
    private $income_date;
    protected $created_at;

}
class expenses extends incomes{
    private $id;
    private $expense_date;
    private $created_at;
}