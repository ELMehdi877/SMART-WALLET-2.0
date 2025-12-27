<?php 
require_once __DIR__ . "/connection.php";
require_once __DIR__ . "/Transaction.php";
require_once __DIR__ . "/Income.php";
require_once __DIR__ . "/Expense.php";
require_once __DIR__ . "/Category.php";


session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}
$user_id = $_SESSION["user_id"];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["income_filtre"])) {
        $category = new Category($_POST["income_filtre"]);
        $income = new Income(0,$user_id,$category,0.0,"","");
        $table_income = $income->getByCategory("incomes",$pdo);
        $_SESSION["filtre_income"] = $table_income;
        header("Location: dashbord.php");
        exit();
    }

    if (isset($_POST["expense_filtre"])) {
        $category = new Category($_POST["expense_filtre"]);
        $expense = new Expense(0,$user_id,$category,0.0,"","");
        $table_expense = $expense->getByCategory("expenses",$pdo);
        $_SESSION["filtre_expense"] = $table_expense;
        header("Location: dashbord.php");
        exit();
    }

}