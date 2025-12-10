<?php

use PHPUnit\Framework\TestCase;

// Include the User class
require_once __DIR__ . '/../../../User/src/models/User.php';


class UserTest extends TestCase {

    private $user;

    protected function setUp(): void {
        // Instantiate a User object for testing
        $this->user = new User(1, "Alex", "alex123", "password", "alex@example.com");
    }

    public function testGetName() {$this->assertEquals("Alex", $this->user->getName());}
    public function testSetName()
     {
        $this->user->setName("John");
        $this->assertEquals("John", $this->user->getName());
    }

    public function testGetUserName() {$this->assertEquals("alex123", $this->user->getUserName());}
    public function testSetUsername() 
    {
        $this->user->setUserName("john123");
        $this->assertEquals("john123", $this->user->getUserName());
    }

    public function testGetEmail() {$this->assertEquals("alex@example.com", $this->user->getEmail()); }
    public function testSetEmail() {
        $this->user->setEmail("john@example.com");
        $this->assertEquals("john@example.com", $this->user->getEmail());
    }
}
