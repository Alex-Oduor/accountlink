<?php

class User{

    public $id;
    public $username;
    public $password;
    public $mpesanumber;

    public function __construct($id ,$username, $password ,$mpesanumber){
        $this->id =$id;
        $this->username =$username;
        $this->password = $password;
        $this->mpesanumber =$mpesanumber;
    }



}
?>