<?php

class PageController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $pageModel = new Application_Model_Page();
        $page = $pageModel->getAllPage(); // haal alles op
        $this->view->page = $page;

    }


}

