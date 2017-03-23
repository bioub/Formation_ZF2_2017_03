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
}