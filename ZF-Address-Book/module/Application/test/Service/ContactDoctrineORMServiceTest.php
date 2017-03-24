<?php

namespace ApplicationTest\Service;


use Application\Entity\Contact;
use Application\Repository\ContactRepository;
use Application\Service\ContactDoctrineORMService;
use Doctrine\ORM\EntityManager;
use PHPUnit\Framework\TestCase;

class ContactDoctrineORMServiceTest extends TestCase
{
    /** @var ContactDoctrineORMService */
    protected $contactService;

    protected function setUp()
    {
        $this->em = $this->getMockBuilder(EntityManager::class)
                ->disableOriginalConstructor()
                ->disableOriginalClone()
                ->getMock();

        $this->repo = $this->getMockBuilder(ContactRepository::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->getMock();

        $this->em
            ->expects($this->any())
            ->method('getRepository')
            ->willReturn($this->repo);

        $this->contactService = new ContactDoctrineORMService($this->em);
    }

    public function testGetAll()
    {
        $this->repo
            ->expects($this->exactly(1))
            ->method('findAll');

        $this->contactService->getAll();
    }

    public function testFind()
    {
        $id = 1;

        $this->repo
            ->expects($this->exactly(1))
            ->method('find');

        $this->contactService->getById($id);
    }
}