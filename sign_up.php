<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    ####### sign_up #######
    if (isset($_POST["inscrire_button"]) && isset($_POST["inscrire_fullname"]) && isset($_POST["inscrire_email"]) && isset($_POST["inscrire_password"])) {
        require "connection.php";
        require "User.php";
        $fullname = trim($_POST["inscrire_fullname"]);
        $inscrire_fullname = trim($_POST["inscrire_fullname"]);
        $inscrire_email = trim($_POST["inscrire_email"]);
        $inscrire_password = password_hash($_POST["inscrire_password"],PASSWORD_DEFAULT);
        
        $user = new User("",$fullname,$inscrire_email,$inscrire_password);

        if ($user->register($pdo)) {
            $_SESSION["inscrire"] = "<p class='text-green-500'>vous avez cree un compte</p>";
            header("Location: index.php");
            exit();
        }
        else{
            $_SESSION["inscrire"] = "<p class='text-red-500'>ce utilisateur existe</p>";
            header("Location: index.php");
            exit();
        }
    }
}
?>