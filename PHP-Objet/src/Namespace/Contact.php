<?php

namespace Orsys\Model;

class Contact
{
    protected $prenom;
    protected $nom;


    protected $logger;

    /** @var Societe */
    protected $societe;

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        $this->logger->debug('call getPrenom');
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     * @return Contact
     */
    public function setPrenom($prenom)
    {
        $this->logger->debug('call setPrenom');
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     * @return Contact
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return Societe
     */
    public function getSociete(): Societe
    {
        return $this->societe;
    }

    /**
     * @param Societe $societe
     * @return Contact
     */
    public function setSociete(Societe $societe): Contact
    {
        $this->societe = $societe;
        return $this;
    }



}