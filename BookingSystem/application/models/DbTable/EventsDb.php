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

    public function addEvent($title,$fullTitle, $start,$where, $end, $description, $additional,$authors  ) {
        $data = array(
            'title' => $title,
            'fullTitle' => $fullTitle,
            'start' => $start,
            'end' => $end,
            'where' => $where,
            'description' => $description,
            'additional' => $additional,
            'authors' => $authors,
        );
        $this->insert($data);
    }

    public function updateEvent($title, $start, $end) {
        $data = array(
            'title' => $title,
            'start' => $start,
            'end' => $end,
            'where' => $where,
            'description' => $description,
            'additional' => $additional,
            'authors' => $authors,
        );
        $this->update($data, 'id = ' . (int) $id);
    }

    public function deleteEvent($id) {
        $this->delete('id = ' . $id);
        
    }
    
    public function getUpcomingEvents($howMany)
    {
        if($howMany > 0 )
            $select = $this->select()
            ->from($this,
                    array('title', 'start', 'end', 'id'))
            ->where("start > DATE_FORMAT(NOW(),'%Y-%m-%d %T')")
            ->order ('start')
            ->limit ($howMany);
        return ($this->fetchAll($select)->toArray());
    }

}

