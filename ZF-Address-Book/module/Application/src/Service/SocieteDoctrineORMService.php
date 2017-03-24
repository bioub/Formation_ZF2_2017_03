<?php

namespace Application\Service;


use Application\Entity\Societe;
use Doctrine\ORM\EntityManager;

class SocieteDoctrineORMService
{
    /** @var EntityManager */
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    protected function getRepository()
    {
        return $this->em->getRepository(Societe::class);
    }

    public function getAll()
    {
        $repo = $this->getRepository();
        return $repo->findBy([], ['name' => 'ASC']);
    }

    public function getAllWithContacts()
    {

    }

    public function getById($id)
    {
        $repo = $this->getRepository();
        return $repo->find($id);
    }
}