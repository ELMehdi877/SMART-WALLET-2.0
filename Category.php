<?php 
// require "connection.php";
class Category{
    // Visibilité (Access Modifiers) && attribute(proprieté)

    public $category_name;
    public function __construct($category_name){
        $this->category_name = $category_name;
    }

}

