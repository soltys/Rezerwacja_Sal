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
        $form = new Application_Form_Event();
        $this->view->event = $form; 
        
        if($this->_request->isPost())
        {
            $post_data = $this->_request->getPost();
            $EventDb = new Application_Model_DbTable_Event();

            //isValid() - argument przyjmuje tablice z danymi przesłanymi przez POST
            if($form->isValid($post_data))
            {
                //unset($post_data['add']);
                //$PersonDb->insert($post_data);
                return $this->_helper->redirector('afteradd','inlog','default');
            }
            else
            {
                $form->populate($post_data);
            }
        }
    }

    public function logoutAction()
    {
        $auth = Zend_Auth::getInstance();
        $auth->clearIdentity();
    }

    public function afteraddAction()
    {
        // action body
    }
}







