<?php

namespace Tutorial\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Controller\IndexController;

class SampleController extends AbstractActionController
{
    public function indexAction()
    {
        if ($this->request->isPost()) {
            $this->prg();
        }

        return new ViewModel([
            'date' => $this->getDate(),
        ]);
    }

    public function exampleAction()
    {
        //return $this->redirect()->toUrl('http://rambler.ru');
        //return $this->forward()->dispatch(IndexController::class, ['action' => 'index']);

        //$this->layout('layout/layoutDefault');

        //$successMessage = 'Success message';
        //$errorMessage   = 'Error message';

        //$this->flashMessenger()->addSuccessMessage($successMessage);
        //$this->flashMessenger()->addErrorMessage($errorMessage);

        //return $this->redirect()->toRoute('tutorial/sample');

        $widget = $this->forward()->dispatch(IndexController::class, ['action' => 'index']);

        $view =  new ViewModel();
        $view->addChild($widget, 'widget');
        $view->setTemplate('tutorial/sample/template');
        return $view;
    }


}
