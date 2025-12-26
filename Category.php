<?php 
require "connection.php";
class Category{
    // Visibilité (Access Modifiers) && attribute(proprieté)

    private $id;
    private $category_name;
    private $created_at;

    // ajouter
    public function __construct($category_name){
        $this->category_name = $category_name;
    }

    //getter
    function getID(string $category_name,PDO $pdo) : ?int{
        $sql = "SELECT id FROM category WHERE category_name = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $category_name
        ]);
        $category_existe = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($category_existe === false) {
            return NULL;
        }
        return $category_existe["id"];
    }

    //setter
    function setID($id){
        $this->id = $id;
    }
    ### composition de category avec (income ,expense)
    
    //tableau contient tous les incomes pour category
    private $incomes = [];

    //tableau contient tous les expenses pour category
    private $expenses = [];
    
    //conection 
    public function create($name){}
    public function getAll($id){}

    #### methode composition pour ajouter les objets ($category , $income , $expense) à la fin de ces tableau 
    
    //fonction d'ajouter un objet $income a son tableau incomes
    public function addIncome(string $user_id ,string $montants ,string $description , string $income_date ,PDO $pdo){
        $sql = "INSERT INTO incomes(user_id,category_id,montants,description,income_date) VALUES (?,?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $user_id,
            $this->id,
            $montants,
            $description,
            $income_date
        ]);
        $this->incomes[] = $income;
    }

    //fonction d'ajouter un objet $expense a son tableau expenses
    public function addExpense($user_id,$category_id,$montants,$description,$expense_date){
        $sql = "INSERT INTO expenses(user_id,category_id,montants,description,expense_date)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $user_id,
            $this->id,
            $montants,
            $description,
            $income_date
        ]);
        $this->expenses[] = $expense;
    }
}

