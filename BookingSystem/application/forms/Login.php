<?php

class Application_Form_Login extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post'); 
        $view = Zend_Layout::getMvcInstance()->getView();
        
        /** konstruuje adres url akcji, która przetworzy dane z formularza do logowania **/
        $url = $view->url(array('controller' => 'login', 'action' => 'login'));
        $this->setAction($url);
        
        $this->addElement('text','username',array('label' => 'Username', 'required' => true, 'filters' => array('StringTrim')));
        $this->addElement('password','password',array('label' => 'Password', 'required' => true));
        $this->addElement('submit','submit',array('ignore' => true, 'label' => 'Login'));
    }
}

