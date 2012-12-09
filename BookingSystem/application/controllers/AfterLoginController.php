<?php

class AfterLoginController extends Zend_Controller_Action
{
    /** zabezpieczenie dostępu do akcji kontrolera
     *  metoda wykonywana przed metodami akcji kontrolera
     */
    public function preDispatch() {
        $auth = Zend_Auth::getInstance(); 
        if(!$auth->hasIdentity())
        {
            return $this->_helper->redirectot('login','index','default');
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
}

