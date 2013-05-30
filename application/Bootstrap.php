<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    public function _initNavigation() {
        // registreer de Navigation plugin
        $this->bootstrap('frontController');
        $front = $this->getResource('frontController');
    }

    public function _initDbAdapter() {
        $this->bootstrap('db');
        $db = $this->getResource('db');
        Zend_Registry::set('db', $db);
        // ophalen dmv Zend_Registry::get('db');
    }

    /**
     * put after _initView
     * Creates all custom routes
     * @param array $options
     * @return Zend_Controller_Router_Route
     */
    public function _initRouter(array $options = null) {


        $router = $this->getResource('frontcontroller')->getRouter();

       $router->addRoute('lang', new Zend_Controller_Router_Route(':lang', array(
            'controller' => 'index',
            'action' => 'index'
        )));


        // the  routes
        $router->addRoute('home', new Zend_Controller_Router_Route(':lang', array(
            'controller' => 'page',
            'action' => 'index'
        )));      
        // 
        $router->addRoute('page', new Zend_Controller_Router_Route(':lang', array(
            'controller' => 'page',
            'action' => 'index'
        )));
    }

}

