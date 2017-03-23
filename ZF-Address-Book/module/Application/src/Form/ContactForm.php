<?php

namespace Application\Form;


use Zend\Form\Form;

class ContactForm extends Form
{
    public function __construct($name = null, array $options = [])
    {
        parent::__construct('contact-form');

        $element = new \Zend\Form\Element\Text('firstName');
        $element->setLabel('Prénom');
        $this->add($element);

        $element = new \Zend\Form\Element\Text('lastName');
        $element->setLabel('Nom');
        $this->add($element);
    }

}