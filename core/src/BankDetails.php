<?php

class BankDetails{
    private $name;
    private $accountnumber;

    public function __construct($name,$accountnumber){
        $this->name= $name;
        $this->accountnumber= $accountnumber;
    }
}

?>