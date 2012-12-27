<?php
//klasa zapewniająca dostęp do tabeli 'user' w bazie danych
class Application_Model_DbTable_UserDb extends Zend_Db_Table_Abstract
{
    protected $_name = 'user';
}

