<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 23/03/2017
 * Time: 09:57
 */

namespace Application\Service;


use Application\Entity\Contact;
use Zend\Db\TableGateway\TableGateway;
use Zend\Hydrator\ClassMethods;
use Zend\Hydrator\HydratorInterface;

class ContactZendDbService implements ContactServiceInterface
{
    /** @var TableGateway */
    protected $gateway;
    /** @var HydratorInterface */
    protected $hydrator;

    /**
     * ContactZendDbService constructor.
     * @param TableGateway $gateway
     * @param HydratorInterface $hydrator
     */
    public function __construct(TableGateway $gateway, HydratorInterface $hydrator)
    {
        $this->gateway = $gateway;
        $this->hydrator = $hydrator;
    }

    /**
     * Retourne tous les contacts
     * @return Contact[]
     */
    public function getAll()
    {
        $contactRs = $this->gateway->select();

        $contacts = [];

        foreach ($contactRs as $row) {
            $contactAssoc = (array) $row;
            $contact = new Contact();
            $this->hydrator->hydrate($contactAssoc, $contact);
            $contacts[] = $contact;
        }

        return $contacts;
    }

    /**
     * Recherche un contact par id
     * @param $id
     * @return Contact
     */
    public function getById($id)
    {
        // TODO: Implement getById() method.
    }

    /**
     * @param array
     */
    public function insert($data)
    {
        // TODO: Implement insert() method.
    }
}