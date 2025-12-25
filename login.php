<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    ####### login #######
    if (isset($_POST["connexion_button"]) && isset($_POST["connexion_email"]) && isset($_POST["connexion_password"])) {
        require "User.php";
        $connexion_email = trim($_POST["connexion_email"]);
        $connexion_password = trim($_POST["connexion_password"]);
        
        $user = new User("","",$connexion_email,"");
        
        $table = $user->getUserByEmail($pdo);
        if ($table) {
            if (password_verify($connexion_password,$table["password"])) {
                $_SESSION["user_id"] = $table["id"];
                header("Location: dashbord.php");
                exit();
            }
            else {
                $_SESSION["inscrire"] = "<p class='text-red-500'>le mode de passe incorrect </p>";
            }
        }
        else {
            $_SESSION["inscrire"] = "<p class='text-red-500'>ce utilisateur n'existe pas </p>";
            
        }
        header("Location: index.php");
        exit();
    }
}
?>