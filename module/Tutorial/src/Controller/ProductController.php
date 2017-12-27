<?php

namespace Tutorial\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ProductController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function addAction()
    {
        return new ViewModel();
    }

    public function addPostAction()
    {
        $title = $this->request->getPost('title');
        $message = '';

        if (! empty($title)) {
            $message = 'Product added';
            $this->flashMessenger()->addSuccessMessage($message);
        } else {
            $message = 'Product not added';
            $this->flashMessenger()->addErrorMessage($message);
        }

        return $this->redirect()->toRoute('tutorial/product');
    }

    public function editAction()
    {
        return new ViewModel();
    }

    public function editPostAction()
    {
        $title = $this->request->getPost('title');
        $message = '';

        if (! empty($title)) {
            $message = 'Product edited';
            $this->flashMessenger()->addSuccessMessage($message);
        } else {
            $message = 'Product not edited';
            $this->flashMessenger()->addErrorMessage($message);
        }

        return $this->redirect()->toRoute('tutorial/product');
    }
}
