<?php

class MobileDetails{
    private $name;
    private $mobileNumber;

    public function __construct($name,$mobileNumber){
        $this->name= $name;
        $this->mobileNumber= $mobileNumber;
    }

    //getters and setters
    public function setName($name){$this->name=$name;}
    public function getName(){return $this->name;}

    public function setMobileNumber($mobileNumber){$this->mobileNumber=$mobileNumber;}
    public function getMobileNumber(){return $this->mobileNumber;}

}

?>