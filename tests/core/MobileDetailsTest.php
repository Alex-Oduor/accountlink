<?php 

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../../core/src/MobileDetails.php';

class MobileDetailsTest extends TestCase
{
    private $mobileAccount;

    protected function setUp(): void
    {
        $this->mobileAccount = new MobileDetails("Isaac kemunto", 123456789);

    }

    public function testGetName(){$this->assertEquals("Isaac kemunto", $this->mobileAccount->getName());}
    public function testSetName()
    {
        $this->mobileAccount->setName("Ali baraza");
        $this->assertEquals("Ali baraza", $this->mobileAccount->getName());
    }
    

    public function testGetMobileNumber(){$this->assertEquals(123456789, $this->mobileAccount->getMobileNumber());}
    public function testSetMobileNumber()
    {
        $this->mobileAccount->setMobileNumber(2345678);
        $this->assertEquals(2345678, $this->mobileAccount->getMobileNumber());
    }
}
?>