<?php

class InlogController extends Zend_Controller_Action
{

    public function preDispatch()
    {
        $auth = Zend_Auth::getInstance(); 
        if(!$auth->hasIdentity())
        {
            return $this->_helper->redirector('login','index','default');
        }
        $this->view->identity = $auth->getIdentity(); 
    }

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function eventAction()
    {
        // action body
    }

    public function logoutAction()
    {
        $auth = Zend_Auth::getInstance();
        $auth->clearIdentity();
    }


}





