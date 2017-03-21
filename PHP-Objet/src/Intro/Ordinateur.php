<?php

class Intro_Ordinateur
{
    protected $marque;
    protected $modele;

    /**
     * @return mixed
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * @param mixed $marque
     * @return Intro_Ordinateur
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * Setter de modele
     * @param string $modele
     * @return Intro_Ordinateur
     */
    public function setModele($modele)
    {
        $this->modele = $modele;
        return $this;
    }


}