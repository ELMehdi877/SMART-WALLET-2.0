<?php 
session_start();
require "User.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}
$user_id = $_SESSION["user_id"];
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["add_category"])) {
    if (isset($_POST["category_name"])) {
        $category_name = $_POST["category_name"];
        $user = new User($user_id,"","","");
        if ($user->addCategory($category_name,$pdo)) {
            $_SESSION["message"] = "cette categorie ".$category_name." existe";
        }
        header('Location: dashbord.php');
        exit();
    }
}
