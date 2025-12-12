<?php

class User{

    private $id;
    private $name;
    private $userName;
    private $password;
    private $email;

    public function __construct($id ,$name ,$userName, $password ,$email){
        $this->id =$id;
        $this->name=$name;
        $this->userName =$userName;
        $this->password = $password;
        $this->email =$email;
    }

    //Getters and setters

    public function getId(){return $this->id;}

    public function setName($name){$this->name=$name;}
    public function getName(){return $this->name;}
    
    public function setUserName($userName){$this->userName=$userName;}
    public function getUserName(){return $this->userName;}

    public function setEmail($email){$this->email=$email;}
    public function getEmail(){return $this->email;}

}
?>