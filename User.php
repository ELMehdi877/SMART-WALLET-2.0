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
    public function __construct($full_name,$em_ail,$pass_word){
        $this->fullname = $full_name;
        $this->email = $em_ail;
        $this->password = password_hash($pass_word,PASSWORD_DEFAULT);
    }

    //fonction pour inseré les donnés sur database
    public function register($pdo) : bool {
        if ($this->getExiste($pdo)) {
            return false;
        }
        else {
            $sql = "INSERT INTO users(fullname,email,password) VALUES (?,?,?)";

            $stmt = $pdo->prepare($sql);
            return $stmt->execute([
            $this->fullname ,
            $this->email ,
            $this->password
            ]);
            return true ;
        }
    }

    //fonction pour verifier l'utilisateur existe
    public function getExiste($pdo) : bool{
        
        $sql = "SELECT id,fullname FROM users WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt ->execute([
            $this->email
        ]);
        return (bool) $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //fonction return les information d'utilisateurs
    public function getByID($id) : arry {
        
    }

    #### methode composition pour ajouter l'objet $category à la fin de sont tableau

    //fonction de ajouter un objet $category a sont tableau categories
    public function addCategory(Category $category){
        $this->categories[] = $category;
    }

}