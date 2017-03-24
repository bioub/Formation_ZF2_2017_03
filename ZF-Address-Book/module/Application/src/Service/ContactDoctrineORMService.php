<?php

namespace Application\Service;


use Application\Entity\Contact;
use Doctrine\ORM\EntityManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;

class ContactDoctrineORMService implements ContactServiceInterface
{
    /** @var EntityManager */
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    protected function getRepository()
    {
        return $this->em->getRepository(Contact::class);
    }

    public function getAll()
    {
        $repo = $this->getRepository();
        return $repo->findAll();
    }

    /**
     * Recherche un contact par id
     * @param $id
     * @return Contact
     */
    public function getById($id)
    {
        $repo = $this->getRepository();
        return $repo->find($id);
    }


    /**
     * Recherche un contact par id en joignant sa société
     * @param $id
     * @return Contact
     */
    public function getByIdWithSociete($id)
    {
        $repo = $this->getRepository();
        return $repo->findWithSociete($id);
    }


    /**
     * @param $data array
     */
    public function insert($data)
    {
        $hydrator = new DoctrineObject($this->em);
        $entity = new Contact();
        $hydrator->hydrate((array) $data, $entity);
        $this->em->persist($entity);
        $this->em->flush();
    }
}