<?php

class IndexController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
       $users = new Application_Model_DbTable_UserDb(); 
       $this->view->users = $users->fetchAll();  
    }

    public function homeAction()
    {
        // action body
    }

    public function ideaAction()
    {
        // action body
    }

    public function lecturesAction()
    {
        // action body
    }

    public function equipmentAction()
    {
        // action body
    }

    public function contactAction()
    {
        // action body
    }
}













