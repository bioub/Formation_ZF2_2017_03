<?php

namespace Application\Form;


use Application\Entity\Societe;
use Zend\Form\Form;

class ContactForm extends Form
{
    public function __construct($em)
    {
        parent::__construct('contact-form');

        $element = new \Zend\Form\Element\Text('firstName');
        $element->setLabel('Prénom');
        $this->add($element);

        $element = new \Zend\Form\Element\Text('lastName');
        $element->setLabel('Nom');
        $this->add($element);

        $element = new \Zend\Form\Element\Email('email');
        $element->setLabel('Email');
        $this->add($element);

        $element = new \Zend\Form\Element\Tel('phone');
        $element->setLabel('Phone');
        $this->add($element);

        $this->add([
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'societe',
            'options' => [
                'label' => 'Société',
                'object_manager' => $em,
                'target_class'   => Societe::class,
                'property'       => 'name',
            ],
        ]);
    }

}