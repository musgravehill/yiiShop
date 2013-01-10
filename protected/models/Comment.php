<?php

class Comment extends CActiveRecord {

    protected $_dbName = 'yiishop';
    protected $_collectionName = 'comment';
    protected $_db;
    protected $_collection;

    public function __construct() {
        try {
            $m = new MongoClient();
            $dbName = $this->_dbName;
            $collectionName = $this->_collectionName;
            $this->_db = $m->$dbName;
            $this->_collection = $this->_db->$collectionName;
        } catch (Exception $e) {
            
        }
    }

    public function addComment($document) {
        //$document = array( "user_id" => (integer), "product_id" => (integer), "comment"=>"Лампа классика жанра!" );
        if ((is_array($document)) && (isset($this->_collection)))
            $this->_collection->insert($document);
        return true;
    }

    public function getComments($criteria) {
        $cursor[] = array("user_id" => 0,
            "product_id" => 0,
            "author" => '',
            "ratingValue" => 0,
            "title" => 'cant load mongo',
            "description" => '',
            "datePublished" => date('Y-m-d H:i:s'));
        if ((is_array($criteria)) && (isset($this->_collection))) {
            $cursor = $this->_collection->find($criteria);
        }
        return $cursor;
    }

    public function getProductRating($product_id) {
        $cursor[] = array("user_id" => 0,
            "product_id" => 0,
            "author" => '',
            "ratingValue" => 0,
            "title" => '',
            "description" => '',
            "datePublished" => date('Y-m-d H:i:s'));
        if (isset($this->_collection)) {
            $cursors = $this->_collection->find(array('product_id'=>(int)$product_id),array('ratingValue'=>1));
            $averageRating = 0;
            $countVote = 0;
            foreach ($cursors as $cursor) {
                $averageRating += (int)$cursor['ratingValue'];
                $countVote++;
            }
            $countVote ? 0 : $countVote=1;
        }
        return array('averageRating'=>round(($averageRating/$countVote),1), 'countVote'=>$countVote-1);
    }

}

?>
