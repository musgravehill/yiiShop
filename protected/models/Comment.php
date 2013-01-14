<?php

class Comment extends dbMongo {

    private static $_collectionName = 'comment';
    protected $_db;
    protected $_collection;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function __construct() {
        parent::__construct();
        $collectionName = self::$_collectionName;
        if ($this->_db instanceof MongoDB) {
            $this->_collection = $this->_db->$collectionName;
        }        
    }

    public function addComment($document) {
        if ((CommentValidator::validate($document)) && (isset($this->_collection))) {
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
        $averageRating = 0;
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
