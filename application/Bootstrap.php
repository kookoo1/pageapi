<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

//    public function _initNavigation() {
//        // registreer de Navigation plugin
//        $this->bootstrap('frontController');
//        $front = $this->getResource('frontController');
//    }

    protected function _initRegisterControllerPlugins() {
        $this->bootstrap('frontController');
        $front = $this->getResource('frontController');

        //$front->registerPlugin(new Syntra_Controller_Plugin_Translate());
        //$front->registerPlugin(new Syntra_Controller_Plugin_Navigation());
        //$front->registerPlugin(new Syntra_Auth_Acl());
        //$front->registerPlugin(new Syntra_Auth_Auth());
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



//        $router->addRoute('api', new Zend_Controller_Router_Route('api/:controller/:action', array(
//            'module' => 'Api',
//            'controller' => 'Page',
//            'action' => 'post'
//        )));
        
//       $router->addRoute('api', new Zend_Controller_Router_Route('api/:controller/', array(
//            'module' => 'Api',
//            'controller' => 'Page'
//        )));
        
        
        
    }

    protected function _initRestRoute() {

        // alle controllers binnen de Api module worden hierdoor REST API controllers
        // Nodig get / post / put /delete  action om dit te laten werken
    $this->bootstrap('frontController');
    $frontController = Zend_Controller_Front::getInstance();
    $restRoute = new Zend_Rest_route($frontController,array(),array('Api'));
    $frontController->getRouter()->addRoute('rest',$restRoute);
    

    }

}

