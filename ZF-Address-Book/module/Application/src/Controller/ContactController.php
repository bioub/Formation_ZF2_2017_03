<?php

namespace Application\Controller;


use Application\Form\ContactForm;
use Application\InputFilter\ContactInputFilter;
use Application\Service\ContactServiceInterface;
use Zend\Http\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ContactController extends AbstractActionController
{
    /** @var Request */
    protected $request;

    /** @var ContactServiceInterface */
    protected $contactService;

    public function __construct(ContactServiceInterface $contactService)
    {
        $this->contactService = $contactService;
    }

    public function listAction()
    {
        $contacts = $this->contactService->getAll();

        return new ViewModel([
            'contactsList' => $contacts
        ]);
    }

    public function showAction()
    {
        $id = $this->params()->fromRoute('id');

        $contact = $this->contactService->getByIdWithSociete($id);

        return new ViewModel([
            'contact' => $contact
        ]);
    }

    public function addAction()
    {
        $form = new ContactForm($this->contactService->getEntityManager());

        if ($this->request->isPost()) {
            $data = $this->request->getPost();
            $inputFilter = new ContactInputFilter();
            $form->setInputFilter($inputFilter);
            $form->setData($data);

            if ($form->isValid()) {
                $dataFiltered = $form->getData();
                $this->contactService->insert($dataFiltered);
                return $this->redirect()->toRoute('contact');
            }
        }

        return new ViewModel([
            'contactForm' => $form
        ]);
    }

    public function listByCompanyAction() {
        return new ViewModel();
    }
}