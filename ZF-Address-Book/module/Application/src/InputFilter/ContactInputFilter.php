<?php

namespace Application\InputFilter;


use Zend\Filter\StringTrim;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;
use Zend\Validator\StringLength;

class ContactInputFilter extends InputFilter
{
    public function __construct()
    {
        $input = new Input('firstName');

        $filter = new StringTrim();
        $input->getFilterChain()->attach($filter);

        $validator = new NotEmpty();
        $input->getValidatorChain()->attach($validator);

        $validator = new StringLength();
        $validator->setMin(1)->setMax(40);
        $validator->setMessage('Le prénom doit faire au moins %min% caractères',
            StringLength::TOO_SHORT);
        $input->getValidatorChain()->attach($validator);

        $this->add($input);
    }

}