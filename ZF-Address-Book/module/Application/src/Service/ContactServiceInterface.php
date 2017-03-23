<?php

namespace Application\Service;


use Application\Entity\Contact;

interface ContactServiceInterface
{
    /**
     * Retourne tous les contacts
     * @return Contact[]
     */
    public function getAll();

    /**
     * Recherche un contact par id
     * @param $id
     * @return Contact
     */
    public function getById($id);

    /**
     * @param array
     */
    public function insert($data);
}