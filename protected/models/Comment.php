<?php

class Comment extends CActiveRecord {

    protected $_dbName = 'yiishop';
    protected $_collectionName = 'comment';
    protected $_db;
    protected $_collection;     

    public function __construct() {
        $m = new MongoClient();
        $dbName = $this->_dbName;
        $collectionName= $this->_collectionName;
        $this->_db = $m->$dbName;
        $this->_collection = $this->_db->$collectionName;        
    }

    public function addComment($document) {
        //$document = array( "user_id" => (integer), "product_id" => (integer), "comment"=>"Лампа классика жанра!" );
        if (is_array($document)) $this->_collection->insert($document);
        return true;
    }
    public function getComments($criteria) {        
        $cursor = $this->_collection->find($criteria);        
        return $cursor;
    }

}

?>
