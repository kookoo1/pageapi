<?php

class Application_Model_Page extends Zend_Db_Table_Abstract {

    // definiëren hoe de tabel eruit ziet 

    protected $_name = 'pages';
    protected $_primary = 'id';

    public function getAllPage() {

        return $this->fetchAll(); // select * from nieuws
    }

//    public function getOnePage($id) {
//        $select = $this->select()
//                ->where('ID = ?', $id);
//        $result = $this->fetchAll($select)->current();
//        return $result;
//    }

}

