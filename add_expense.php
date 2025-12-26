<?php 
require "User.php";

session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}
$user_id = $_SESSION["user_id"];
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["add_income"])) {
    if (isset($_POST["incomeCategory"]) && isset($_POST["incomeAmount"]) && isset($_POST["incomeDesc"]) && isset($_POST["incomeDate"])) {
        $user = new User($user_id,'','','');
        $user->addIncome($_POST["incomeCategory"],$_POST["incomeAmount"],$_POST["incomeDesc"],$_POST["incomeDate"],$pdo);
    }
    header("Location: dashbord.php");
    exit();
}