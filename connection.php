<?php 

class Database{
    public $pdo;

    //magic methode connection avec database
    public function __construct(){
        $this->pdo = new PDO("mysql:host=localhost;dbname=smart_wallet2_0;charset=utf8","root","");
    }
}

$db = new Database();
$pdo = $db->pdo;



// class Database{
//     public function connect(){
//         return new PDO("mysql:host=localhost;dbname=smart_wallet2_0;charset=utf8","root","");
//     }
// }

// $db = new Database();
// $pdo = $db->connect() ;

