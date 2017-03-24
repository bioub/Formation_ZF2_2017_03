<?php

namespace ApplicationTest\Entity;

use Application\Entity\Contact;
use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase
{
    /** @var Contact */
    protected $contact;

    protected function setUp()
    {
        $this->contact = new Contact();
    }

    public function testGetSetFirstName()
    {
        $this->contact->setFirstName('John');
        $this->assertEquals('John', $this->contact->getFirstName());
    }

    public function testGetSetLastName()
    {
        $this->contact->setLastName('Doe');
        $this->assertEquals('Doe', $this->contact->getLastName());
    }
}