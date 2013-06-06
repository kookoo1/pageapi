<?php

class PageController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {


        // action body
        $pageModel = new Application_Model_Page();
        $page = $pageModel->getAllPage(); // haal alles op
        // $page = $pageModel->getOnePage($id); // haal alles op
        $this->view->page = $page;
    }

    public function onepageAction() {
        $id = $this->_getParam('id'); // $_GET['id']

//        var_dump('id ='.$id);
        $pageModel = new Application_Model_Page();
//        $page = $pageModel->getAllPage(); // haal alles op
//        $page = $pageModel->getOnePage($id); // haal alles op
        $page = $pageModel->find($id)->current();
        $this->view->page = $page;
    }

}

