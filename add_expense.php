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
        if ($_POST["expenseAmount"] <= 0) {
            $_SESSION["expenseAmount"] = "le montants que vous avez insairé ".$_POST["expenseAmount"]." et incorrect";
        }
        else {
            $_SESSION["income_info"][]=[$user_id,$_POST["expenseCategory"],$_POST["expenseAmount"],$_POST["expenseDesc"],$_POST["expenseDate"]];
            $category = new Category($_POST["expenseCategory"]);
            $user = new User($user_id,'','','');
            $user->addExpense($category,$_POST["expenseAmount"],$_POST["expenseDesc"],$_POST["expenseDate"],$pdo);
        }
    }
    header("Location: dashbord.php");
    exit();
}