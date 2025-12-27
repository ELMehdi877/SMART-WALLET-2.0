<?php 
require_once __DIR__ . "/connection.php";
require_once __DIR__ . "/Transaction.php";
require_once __DIR__ . "/Expense.php";
require_once __DIR__ . "/Category.php";

session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}


$user_id = $_SESSION["user_id"];
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update_expense"])) {
    if (isset($_POST["expenseUpdateCategory"]) && isset($_POST["expenseUpdateAmount"]) && isset($_POST["expenseUpdateDesc"]) && isset($_POST["expenseUpdateDate"]) && isset($_POST["expenseUpdateid"])) { 

        $_SESSION["expense_info"]=[$_POST["expenseUpdateid"],$user_id,$_POST["expenseUpdateCategory"],$_POST["expenseUpdateAmount"],$_POST["expenseUpdateDesc"],$_POST["expenseUpdateDate"]];
        $category = new Category($_POST["expenseUpdateCategory"]);
        $update_expense = new Expense($_SESSION["expense_info"][0],$_SESSION["expense_info"][1],$category,$_SESSION["expense_info"][3],$_SESSION["expense_info"][4],$_SESSION["expense_info"][5]);
        $update_expense->update("expenses",$pdo);

    }
    header("Location: dashbord.php");
    exit();
}