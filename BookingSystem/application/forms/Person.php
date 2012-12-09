<?php

class Application_Form_Person extends Zend_Form
{
    public function init()
    {
       $this->setMethod('post'); 
       $this->addElement('text','username',array('label' => 'Username'));
       $this->addElement('password','password',array('label' => 'Password'));
       $this->addElement('password','repassword',array('label' => 'Confirm Password'));
       $this->addElement('text','e-mail',array('label' => 'E-mail'));
       $this->addElement('checkbox','subscription',array('label' => 'Yes, send me e-mails on upcoming events'));
      
       $this->addElement('text','firstName',array('label' => 'First Name'));
       $this->addElement('text','lastName',array('label' => 'Last Name'));
       $this->addElement('text','company',array('label' => 'Company / University'));
       $this->addElement('select','country',array('label' => 'Country'));
       $this->addElement('text','city',array('label' => 'City'));
       $this->addElement('text','city',array('label' => 'City'));

       $this->addElement('text','address',array('label' => 'Address'));
       $this->addElement('text','postalCode',array('label' => 'Postal Code'));
       $this->addElement('text','businessPhone',array('label' => 'Business Phone'));
       $this->addElement('submit','create',array('label' => 'Create'));
    }
}