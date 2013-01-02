<?php

class Application_Form_Event extends Zend_Form
{
    public function init()
    {
       $this->setMethod('post'); 
       $view = Zend_Layout::getMvcInstance()->getView();
        
       $url = $view->url(array('controller' => 'inlog', 'action' => 'event'), 'default');
       $this->setAction($url);
       
       $this->addElement('text','subject', array(
            //StringTrim - usuwa koncowe i wiodace spacje
            'filters'    => array('StringTrim', 'StringToLower'),
            'validators' => array('Alpha', array('StringLength', false,)),
            'required'   => true,
            'label' => 'Subject*'));
    
       
       $this->addElement('text','speaker',array('label' => 'Speaker/Leader*', 'required' => true,
            'filters' => array('StringTrim'),
            'validators' => array('Alpha', array('StringLength', false,)),));
       
       $this->addElement('checkbox','order',array('label' => 'Projector',));
       $this->addElement('checkbox','order1',array('label' => 'Slide projector',));
       $this->addElement('checkbox','order2',array('label' => 'Microphone',));
       $this->addElement('checkbox','order3',array('label' => 'Computer',));
      
      
       $this->addElement('text','description',array('required' => true,'label' => 'Description of the event*',
           'validators' => array('Alpha')));
       $this->addElement('text','date',array('required' => true,'label' => 'Date* [date format yyyy-mm-dd]',
            'validators' => array('Date')));
       $this->addElement('text','time',array('required' => true,'label' => 'Time* [time format hh:mm]',
            'validators' => array('Digits')));

       $this->addElement('text','room',array('required' => true,'label' => 'Room number*',
           'validators' => array('Digits')));

       $this->addElement('submit', 'add', array('required' => false, 'ignore' => true,'label' => 'Add',));
    }

}

