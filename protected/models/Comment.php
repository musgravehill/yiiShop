<?php

class Comment {    
    protected static $_dbName = 'yiishop';
    protected static $_collectionName = 'comment';
    protected static $_username = 'yiishop';
    protected static $_password = 'yiishop';
    protected static $_host = '127.0.0.1';
    protected static $_port = 27017;
    protected $_db;
    protected $_collection;    

    public function __construct() {        
        try {
            $m = new MongoClient("mongodb://".self::$_username.":".self::$_password."@".self::$_host.":".self::$_port."/".  self::$_dbName);            
            $dbName = self::$_dbName;
            $collectionName = self::$_collectionName;
            $this->_db = $m->$dbName;
            $this->_collection = $this->_db->$collectionName;
        } catch (Exception $e) {
            
        }
    }

    public function addComment($document) {        
        if (  (CommentValidator::validate($document)) && (isset($this->_collection))) {            
            $this->_collection->insert($document);
        }
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
        $averageRating =0;
        $countVote = 0;
        $cursor[] = array("user_id" => 0,
            "product_id" => 0,
            "author" => '',
            "ratingValue" => 0,
            "title" => '',
            "description" => '',
            "datePublished" => date('Y-m-d H:i:s'));
        if (isset($this->_collection)) {
            $cursors = $this->_collection->find(array('product_id' => (int) $product_id), array('ratingValue' => 1));
            $averageRating = 0;
            $countVote = 0;
            foreach ($cursors as $cursor) {
                $averageRating += (int) $cursor['ratingValue'];
                $countVote++;
            }
            if ($countVote > 0) {
                $averageRating = round(($averageRating / $countVote), 1);
            } else {
                $averageRating = 0;
            }
        }
        return array('averageRating' => $averageRating, 'countVote' => $countVote);
    }

}

?>
