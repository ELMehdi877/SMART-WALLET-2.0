<?php 
require_once __DIR__ . "/connection.php";
require_once __DIR__ . "/Transaction.php";
require_once __DIR__ . "/Income.php";
require_once __DIR__ . "/Category.php";

session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}


$user_id = $_SESSION["user_id"];
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["incomeDelete"])) {
    $category = new Category("");
    $delete_income = new Income($_POST["incomeDelete"],$user_id,$category,0,"","");
    $delete_income->delete("incomes",$pdo);
    header("Location: dashbord.php");
    exit();
} 