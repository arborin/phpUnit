<?php

class UserTest extends \PHPUnit\Framework\TestCase
{
    public function testThatWeCanGetTheFristName()
    {
        $user = new \App\Models\User;

        $user->setFirstName("Bob");

        $this->assertEquals($user->getFirstName(), 'Bob');
    }

    public function testLastName()
    {
        $user = new \App\Models\User;

        $user->setLastName("Kakachia");

        $this->assertEquals($user->getLastName(), "Kakachia");
    }

    public function testFullUserName()
    {
        $user = new \App\Models\User;
        $user->setFirstName("Jemali");
        $user->setLastName("Kakachia");

        $this->assertEquals($user->getFullName(), "Jemali Kakachia");
    }


    public function testFirstAndLastNameAreTrimed()
    {
        $user = new \App\Models\User;
        $user->setFirstName("Jemali");
        $user->setLastName(" Kakachia   ");

        $this->assertEquals($user->getFirstName(), "Jemali");
        $this->assertEquals($user->getLastName(), "Kakachia");
    }


    public function testEmailAddressCanBeSet()
    {
        $user = new \App\Models\User;
        $user->setEmail('billy@gmail.com');

        $this->assertEquals($user->getEmail(), 'billy@gmail.com');
    }


    public function testEmailVariableValues()
    {
        $user = new \App\Models\User;
        $user->setFirstName("Jemali");
        $user->setLastName(" Kakachia   ");
        $user->setEmail("nika.kobaidze@gmail.com");
        
        $emailVariables = $user=>getEmailVariables();
        
        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);
        
        $this->assertEquals($emailVariables['full_name'], "Jemali Kakachia");
        $this->assertEquals($emailVariables['email'], 'nika.kobaidze@gmail.com');
    }
}
