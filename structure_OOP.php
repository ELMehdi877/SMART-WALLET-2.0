<?php

##class uer
class User{
    // Visibilité (Access Modifiers) && attribute(proprieté)
    private $id;
    private $fullname;
    private $email;
    private $password;

    ### composition de user avec category

    //tableau contient tous les categories de l'utilisateur
    private $categories = [];

    //fonction pour remplie les proprieté
    public function __construct($full_name,$em_ail,$pass_word){
        $this->fullname = $full_name;
        $this->email = $em_ail;
        $this->password = password_hash($pass_word,PASSWORD_DEFAULT);
    }

    //fonction pour inseré les donnés sur database
    public function register($pdo){
        $sql = "INSERT INTO users(fullname,email,password) VALUES (?,?,?)";

        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
        $this->fullname ,
        $this->email ,
        $this->password,
        ]);
    }

    //fonction pour verifier l'utilisateur existe
    public function login($email,$password){}

    //fonction return les information d'utilisateurs
    public function getByID($id){}

    #### methode composition pour ajouter l'objet $category à la fin de sont tableau

    //fonction de ajouter un objet $category a sont tableau categories
    public function addCategory(Category $category){
        $this->categories[] = $category;
    }

}

#class Category
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

#class Transaction
class Transaction {
    // Visibilité (Access Modifiers) && attribute(proprieté)
    protected $id;
    protected $category_id;
    protected $amount;
    protected $description; 
    protected $created_at;
    
    #### methode d'héritage
    public function __construct($category_id,$amount,$descriotion,){
        $this->category_id = $categ;
        $this->amount = $amoun;
        $this->description = $desc;
    }
    public function creatte(){}
    public function getByID($id){}
    public function getByCategory($category_id){}
    public function update($id){}
    public function delete($id){}
}

#class Income
class Income extends Transaction{
    private $income_date;

}

#class Expense
class Expense extends Transaction{
    private $expense_date;
}

