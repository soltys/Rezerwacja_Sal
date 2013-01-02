<?php

class Application_Model_DbTable_EventsDb extends Zend_Db_Table_Abstract
{

    protected $_name = 'events';
    public function getEvent($id) {
        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }
    public function getEventsJson()
    {
        $select = $this->select();
        $select->from($this,(array('id','title','start','end')));
        return json_encode($this->fetchAll($select)->toArray(),JSON_NUMERIC_CHECK);
        
    }

    public function addEvent($title, $start, $end) {
        $data = array(
            'title' => $title,
            'start' => $start,
            'end' => $end,
        );
        $this->insert($data);
    }

    public function updateEvent($title, $start, $end) {
        $data = array(
            'title' => $title,
            'start' => $start,
            'end' => $end,
        );
        $this->update($data, 'id = ' . (int) $id);
    }

    public function deleteEvent($id) {
        $this->delete('id = ' . $id);
        
    }

}

