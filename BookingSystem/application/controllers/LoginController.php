<?php

class LoginController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
         $this->view->form = new Application_Form_Login();
    }

    public function loginAction()
    {
          /** widokiem tej akcji jest widok akcji index = pusty formularz **/
          $this->_helper->viewRenderer('index'); 
          $form = new Application_Form_Login(); 
          
          if ($form->isValid($this->getRequest()->getPost()))
          {
              /** null - połączenie domyślne **/
              $adapter = new Zend_Auth_Adapter_DbTable(null, 'user', 'username', 'password');
              $adapter->setIdentity($form->getValue('username'));
              $adapter->setCredential($form->getValue('password'));
              
              $auth = Zend_Auth::getInstance();
              
              /** sprawdzenie, czy podane hasło jest poprawne; w bieżącej sesji zostaje zapamiętany wynik autoryzacji
               *  w dowolnym miejscu aplikacji możemy sparwdzić [hasIdentity()] czy użytkownik został poprawnie zalogowany
               */
              
              $result = $auth->authenticate($adapter);

              /** zwraca identyfikator w postaci stałej klasy Zend_Auth_Result dla określenia powodu nieudanego
               *  uwierzytelniania lub sprawdzenia czy uwierzytelnianie się udało.
               */
 switch ($result->getCode()) 
              {
                case Zend_Auth_Result::FAILURE_IDENTITY_NOT_FOUND:
                    /** obsługujemy nieistniejącą tożsamość **/
                    $form->username->addError('Invalid login');
                break;

                case Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID:
                    /** obsługujemy nieprawidłowe hasło **/
                    $form->password->addError('Invalid password');
                break;

                case Zend_Auth_Result::SUCCESS:
                    return $this->_helper->redirector('index','inlog','default');
                break;

                default:
                    /** obsługujemy inne błędy **/
                break;
              }
            }
            $this->view->form = $form;
    }

    public function registrationAction()
    {
        $form = new Application_Form_Person();
        $this->view->form = $form; 
     
        if($this->_request->isPost())
        {
            $post_data = $this->_request->getPost();
            $PersonDb = new Application_Model_DbTable_PersonDb();
           
            //var_dump($post_data);
            //isValid() - argument przyjmuje tablice z danymi przesłanymi przez POST
            if($form->isValid($post_data))
            {
                unset($post_data['create']);
                $PersonDb->insert($post_data);
                return $this->_helper->redirector('afterreg','index','default');
            }
            else
            {
                $form->populate($post_data);
            }
        }
    }

    public function helpAction()
    {
        // action body
    }

    public function logoutAction()
    {
        $auth = Zend_Auth::getInstance();
        $auth->clearIdentity();
        
        /** przekierowanie na stronę login/index **/
        return $this->_helper->redirector('auth','index','default');
    }
}











