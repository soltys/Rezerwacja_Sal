<?php

class Application_Form_Event extends Zend_Form
{
    public function init()
    {
       $this->setMethod('post'); 
       $view = Zend_Layout::getMvcInstance()->getView();
        
       $url = $view->url(array('controller' => 'inlog', 'action' => 'event'), 'default');
       $this->setAction($url);
       
       $this->addElement('text','title', array(
            //StringTrim - usuwa koncowe i wiodace spacje
            'filters'    => array('StringTrim', 'StringToLower'),
            'validators' => array('Alpha', array('StringLength', false,)),
            'required'   => true,
            'label' => 'Title*'));
       
       $this->addElement('text','fullTitle', array(
            //StringTrim - usuwa koncowe i wiodace spacje
            'filters'    => array('StringTrim', 'StringToLower'),
            'validators' => array('Alpha', array('StringLength', false,)),
            'required'   => true,
            'label' => 'Full title*'));
      

       $this->addElement('text','start',array('required' => true,'label' => 'Start of the event*  [yyyy-mm-dd hh:mm:ss]',
            ));
       
       $this->addElement('text','end',array('required' => true,'label' => 'End of the event*  [yyyy-mm-dd hh:mm:ss]',
            ));

       $this->addElement('text','where',array('required' => true,'label' => 'Number of classroom*',
            'validators' => array('Digits')));

       $this->addElement('textarea','description',array('required' => true,'label' => 'Description of the event*',
           'validators' => array('Alpha'), 'class' => 'textarea'));
       
       $this->addElement('text','additional',array('required' => false,'label' => 'Additional requirements (equipment etc.)',
           'validators' => array('Alpha')));
       
       $this->addElement('text','author1',array('label' => 'Speaker/Leader 1*', 'required' => true,
            'filters' => array('StringTrim'),
            'validators' => array('Alpha', array('StringLength', false,)),));
       $this->addElement('text','author2',array('label' => 'Speaker/Leader 2 [optional]', 'required' => false,
            'filters' => array('StringTrim'),
            'validators' => array('Alpha', array('StringLength', false,)),));
       $this->addElement('text','author3',array('label' => 'Speaker/Leader 3 [optional]', 'required' => false,
            'filters' => array('StringTrim'),
            'validators' => array('Alpha', array('StringLength', false,)),));
        
       $this->addElement('submit', 'add', array('required' => false, 'ignore' => true,'label' => 'Add',));
    }
}