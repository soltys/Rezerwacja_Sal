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

       /* metoda zwraca cała zawartość bazy danych */
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
        $view = $this->view;
        $view->addHelperPath("Vapps/View/Helper/",'Vapps_View_Helper');
        $view->addHelperPath("ZendX/JQuery/View/Helper", "ZendX_JQuery_View_Helper");
        $view->jQuery()->addStylesheet('js/jquery/css/smoothness/jquery-ui-1.9.2.custom.css');
//                $view->jQuery()->addStylesheet('js/fullcalendar/fullcalendar.print.css');
        $view->jQuery()->addStylesheet('js/fullcalendar/fullcalendar.css');
        $view->jQuery()->setLocalPath('js/jquery/js/jquery-1.8.3.js');
        $view->jQuery()->setUiLocalPath('js/jquery/js/jquery-ui-1.9.2.custom.js');
        $view->jQuery()->addJavascriptFile('js/fullcalendar/fullcalendar.js');
        $view->jQuery()->enable();
        $view->jQuery()->uiEnable();
        $events = new Application_Model_DbTable_EventsDb();
        $this->view->eventsData = $events->getEventsJson();
    }

    public function equipmentAction()
    {
        // action body
    }

    public function contactAction()
    {
        // action body
    }

    public function afterregAction()
    {
        // action body
    }
}



















