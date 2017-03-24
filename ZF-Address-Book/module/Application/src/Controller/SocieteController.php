<?php

namespace Application\Controller;


use Application\Service\SocieteDoctrineORMService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SocieteController extends AbstractActionController
{
    /** @var SocieteDoctrineORMService */
    protected $societeService;

    public function __construct(SocieteDoctrineORMService $societeService)
    {
        $this->societeService = $societeService;
    }


    public function listAction()
    {
        $societes = $this->societeService->getAll();

        return new ViewModel([
            'societes' => $societes
        ]);
    }

    public function showAction()
    {
        $id = $this->params()->fromRoute('id');

        $societe = $this->societeService->getById($id);

        if (!$societe) {
            $this->getResponse()->setStatusCode(404);
        }

        return new ViewModel([
            'societe' => $societe
        ]);
    }

    public function addAction()
    {

    }
}