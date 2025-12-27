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
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update_income"])) {
    if (isset($_POST["incomeUpdateCategory"]) && isset($_POST["incomeUpdateAmount"]) && isset($_POST["incomeUpdateDesc"]) && isset($_POST["incomeUpDate"]) && isset($_POST["incomeUpdateid"])) {

        $_SESSION["income_info"]=[$_POST["incomeUpdateid"],$user_id,$_POST["incomeUpdateCategory"],$_POST["incomeUpdateAmount"],$_POST["incomeUpdateDesc"],$_POST["incomeUpDate"]];
        $category = new Category($_POST["incomeUpdateCategory"]);
        $update_income = new Income($_SESSION["income_info"][0],$_SESSION["income_info"][1],$category,$_SESSION["income_info"][3],$_SESSION["income_info"][4],$_SESSION["income_info"][5]);
        $update_income->update("incomes",$pdo);

    }
    header("Location: dashbord.php");
    exit();
}