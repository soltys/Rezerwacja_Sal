<?php

class Application_Form_Person extends Zend_Form
{
    public function init()
    {
       $this->setMethod('post'); 
       $view = Zend_Layout::getMvcInstance()->getView();
        
       $url = $view->url(array('controller' => 'login', 'action' => 'registration'), 'default');
       $this->setAction($url);
       
       $this->addElement('text','username', array(
            'filters'    => array('StringTrim', 'StringToLower'),
            'validators' => array('Alpha', array('StringLength', false, array(3, 20)),),
            'required'   => true,
            'label' => 'Login* [from 3 to 20 characters]'));
       
       $this->addElement('password','password',array('required' => true,'label' => 'Password* [from 8 to 20 characters]',
            'validators' => array('Alnum', array('StringLength', false, array(8, 20)),)));
       
       $this->addElement('password','repassword',array('required' => true, 'label' => 'Confirm Password*'));
       
       $this->addElement('text','email',array('label' => 'E-mail*', 'required' => true,
            'filters' => array('StringTrim'),
            'validators' => array('EmailAddress')));
       
       $this->addElement('checkbox','subscription',array('label' => 'Yes, send me e-mails on upcoming events'));
      
       $this->addElement('text','firstName',array('required' => true,'label' => 'First Name*',
           'validators' => array('Alpha')));
       $this->addElement('text','lastName',array('required' => true,'label' => 'Last Name*',
            'validators' => array('Alpha')));
       $this->addElement('text','company',array('required' => true,'label' => 'Name of Company / University*',
            'validators' => array('Alpha')));
       $this->addElement('text','country',array('required' => true,'label' => 'Country*',
            'validators' => array('Alpha')));
       $this->addElement('text','city',array('required' => true,'label' => 'City*',
            'validators' => array('Alpha')));

       $this->addElement('text','businessPhone',array('required' => true,'label' => 'Business Phone*',
           'validators' => array('Digits')));

       $this->addElement('submit', 'create', array('required' => false, 'ignore' => true,'label' => 'Create',));

    }
}