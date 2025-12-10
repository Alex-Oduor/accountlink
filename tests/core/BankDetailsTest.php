<?php 

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../../core/src/BankDetails.php';

class BankDetailsTest extends TestCase
{
    private $Account;

    protected function setUp(): void
    {
        $this->Account = new BankDetails("Isaac kemunto", 123456789);
    }

    public function testGetName(){$this->assertEquals("Isaac kemunto", $this->Account->getName());}
    public function testSetName()
    {
        $this->Account->setName("Ali baraza");
        $this->assertEquals("Ali baraza", $this->Account->getName());
    }
    

    public function testGetAccountNumber(){$this->assertEquals(123456789, $this->Account->getAccountNumber());}
    public function testSetAccountNumber()
    {
        $this->Account->setAccountNumber(2345678);
        $this->assertEquals(2345678, $this->Account->getAccountNumber());
    }
}
?>