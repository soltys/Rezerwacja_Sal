<?php

class Application_Form_Login extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');
        $view = Zend_Layout::getMvcInstance()->getView();
        
        /** konstruuje adres url akcji, która przetworzy dane z formularza do logowania**/  
        $url = $view->url(array('controller' => 'login', 'action' => 'login'), 'default');
        $this->setAction($url);
        
        $username = $this->addElement('text', 'username', array(
            'filters'    => array('StringTrim', 'StringToLower'),
            'validators' => array('Alpha', array('StringLength', false, array(3, 20)),),
            'required'   => true,
            'label'      => 'Username:',
        ));

        $password = $this->addElement('password', 'password', array(
            'filters'    => array('StringTrim'),
            'validators' => array('Alnum', array('StringLength', false, array(8, 20)),),
            'required'   => true,
            'label'      => 'Password:',
        ));

        $this->addElement('submit', 'submit', array('ignore' => true, 'label' => 'Login'));
    }
}

