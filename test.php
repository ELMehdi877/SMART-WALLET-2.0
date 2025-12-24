<?php
    class user{
        //Attributes
        //access modifiers & attribute
        public $name;
        protected $email;
        private $password;
        public $phone;


        //Methods
        public function test(){
            //logic
        }
        public function __construct($name, $email, $password){
            //automatic when using "new"
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
        }
        // public function __set($attribute, $value){
        //     $this->$attribute = $value;
        // }
        public function setName($value){
            $this->name = $value;
        }
        public function setEmail($value){
            $this->email = $value;
        }
        public function setPhone($value){ 
            if(substr($value,0,1) === '0'){
                $this->phone = preg_replace('/0/','+212', $value, 1);
            }
            else{
                $this->phone = $value;
            }
        }
        public function __get($attribute){
            return $this->$attribute;
        }
    }

    class child extends user{
        
    }

    $user_01 = new user("Mehdi", "fake@gmail.com", "password");

    $user_01->setPhone('0625156075');
    echo "<br>";
    echo $user_01->phone;
    echo "<br>";
    echo $user_01->name;
    echo "<br>";
    $user_01->setName('Omar');
    echo $user_01->name;
    echo "<br>";
    $user_01->email = "fake2@gmail.com"; //set
    echo $user_01->email; //get
    echo "<br>";
    $user_01->password = "password2"; //set
    echo $user_01->password; //get
    // $user_02 = new user;
