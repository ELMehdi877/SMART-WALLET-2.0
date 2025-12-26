<?php 
require_once __DIR__ . "/connection.php";
require_once __DIR__ . "/Transaction.php";
require_once __DIR__ . "/Expense.php";

session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}


$user_id = $_SESSION["user_id"];
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["expenseDelete"])) { 
    $delete_expense = new Expense($_POST["expenseDelete"],$user_id,"","","","");
    $delete_expense->delete("expenses",$pdo);
    header("Location: dashbord.php");
    exit();
} 