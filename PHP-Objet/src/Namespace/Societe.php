<?php

namespace Orsys\Model;

class Societe
{
    protected $nom;
    protected $ville;

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     * @return Societe
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     * @return Societe
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
        return $this;
    }


}