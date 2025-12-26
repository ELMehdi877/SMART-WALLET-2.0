<?php
require "connection.php";
require "Income.php";
require "Expense.php";

class User{
    // Visibilité (Access Modifiers) && attribute(proprieté)
    private $id;
    private $fullname;
    private $email;
    private $password;

    ### composition de user avec category

    //tableau contient tous les categories de l'utilisateur
    private $incomes = [];
    private $expenses = [];

    //fonction pour remplie les proprieté
    public function __construct($id,$full_name,$em_ail,$pass_word){
        $this->id = $id;
        $this->fullname = $full_name;
        $this->email = $em_ail;
        $this->password = $pass_word;
    }

    //fonction pour inseré les donnés sur database
    public function register(PDO $pdo) : bool {
        if ($this->getUserByEmail($pdo) === NULL) {
            $sql = "INSERT INTO users(fullname,email,password) VALUES (?,?,?)";
    
            $stmt = $pdo->prepare($sql);
            return $stmt->execute([
            $this->fullname ,
            $this->email ,
            $this->password
            ]);
        }
        else {
            return false;
        }
    }

    //fonction pour verifier l'utilisateur existe
    public function getUserByEmail(PDO $pdo) : ?array{
        
        $sql = "SELECT id,password FROM users WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt ->execute([
            $this->email
        ]);
        $existe = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($existe === false) {
            return NULL;
        }
        return $existe;
    }
    

    //fonction return les information d'utilisateurs
    public function getByID(PDO $pdo) : array {
        $sql = "SELECT id,fullname,email,password
        FROM users u 
        WHERE u.id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $this->id 
        ]);
        return $user_info = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    #### methode composition pour ajouter l'objet $category à la fin de sont tableau

    //fonction de ajouter un objet $category a sont tableau categories
    public function addCategory(string $category_name,PDO $pdo) : bool{
        $category = new Category($category_name);
        if($category->getID($category_name,$pdo)){
            return true;
        }
        else {
            $sql = "INSERT INTO category(user_id,category_name) VALUES (?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                $this->id,
                $category_name
            ]);
            $category = new Category($category_name);
            $this->categories[] = $category;
            return false;
        }
    }
    public function addIncome(string $category_name,float $montants,string $description,string $income_date,PDO $pdo){
        
            $sql = "INSERT INTO incomes(user_id,category_name,montants,description,income_date) VALUES (?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                $this->id,
                $category_name,
                $montants,
                $description,
                $income_date
            ]);
            $income = new Income($category_name,$montants,$description,$income_date);
            $this->incomes[] = $income;
    }
}