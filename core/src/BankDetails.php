<?php

class BankDetails{
    private $name;
    private $accountNumber;

    public function __construct($name,$accountNumber){
        $this->name= $name;
        $this->accountNumber= $accountNumber;
    }

    //getters and setters
    public function setName($name){$this->name=$name;}
    public function getName(){return $this->name;}

    public function setAccountNumber($accountNumber){$this->accountNumber=$accountNumber;}
    public function getAccountNumber(){return $this->accountNumber;}
}

?>