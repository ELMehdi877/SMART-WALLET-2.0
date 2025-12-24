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