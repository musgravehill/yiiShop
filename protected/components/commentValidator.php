<?php
class CommentValidator {
    protected static $minRatingValue = 1;
    protected static $maxRatingValue = 5;
    protected static $minTitle = 2;    
    
    public static function validate($document) { 
        if ($document['ratingValue'] < self::$minRatingValue) return false;
        if ($document['ratingValue'] > self::$maxRatingValue) return false;
        if (mb_strlen($document['title']) < self::$minTitle) return false;
        return true;        
    }
    
}
    
