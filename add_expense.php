<?php 
require "User.php";

session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}
$user_id = $_SESSION["user_id"];
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["add_expense"])) {
    if (isset($_POST["expenseCategory"]) && isset($_POST["expenseAmount"]) && isset($_POST["expenseDesc"]) && isset($_POST["expenseDate"])) {
        $user = new User($user_id,'','','');
        $user->addExpense($_POST["expenseCategory"],$_POST["expenseAmount"],$_POST["expenseDesc"],$_POST["expenseDate"],$pdo);
    }
    header("Location: dashbord.php");
    exit();
}