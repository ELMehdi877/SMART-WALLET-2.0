<?php
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
    public function __construct($id,$full_name,$em_ail,$pass_word){
        $this->id = $id;
        $this->fullname = $full_name;
        $this->email = $em_ail;
        $this->password = $pass_word;
    }

    //fonction pour inseré les donnés sur database
    public function register($pdo) : bool {
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
    public function getUserByEmail($pdo) : ?array{
        
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
    public function getByID($pdo) : array {
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
    public function addCategory(Category $category){
        $this->categories[] = $category;
    }

}