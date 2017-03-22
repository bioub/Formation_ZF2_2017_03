<?php

namespace Application\Controller;


use Application\Entity\Contact;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterServiceFactory;
use Zend\Db\TableGateway\TableGateway;
use Zend\Http\Response;
use Zend\Hydrator\ClassMethods;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ContactController extends AbstractActionController
{
    /** @var TableGateway */
    protected $gateway;

    /**
     * ContactController constructor.
     * @param TableGateway $gateway
     */
    public function __construct(TableGateway $gateway)
    {
        $this->gateway = $gateway;
    }


    public function listAction()
    {
        $contactRs = $this->gateway->select();

        $contacts = [];
        $hydrator = new ClassMethods();

        foreach ($contactRs as $row) {
            $contactAssoc = (array) $row;
            $contact = new Contact();
            $hydrator->hydrate($contactAssoc, $contact);
            $contacts[] = $contact;
        }

        return new ViewModel([
            'contactsList' => $contacts
        ]);
    }

    public function showAction()
    {
        return new ViewModel();
    }

    public function addAction()
    {
        return new ViewModel();
    }

    public function listByCompanyAction() {
        return new ViewModel();
    }
}