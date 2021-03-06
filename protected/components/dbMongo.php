<?php

class dbMongo {
    /*
     * mongoexport -h ds051077.mongolab.com:51077 -d yiishop -c comment -u uyiishop -p pyiishop -o mongolab-yiishop-dump.json
     */

    protected $_db;
    protected $_collection;
    private static $_models=array();
    //private static $_connectionString = "mongodb://yiishop:yiishop@127.0.0.1:27017/yiishop";
    private static $_connectionString = "mongodb://uyiishop:pyiishop@ds051077.mongolab.com:51077/yiishop"; //my acc on https://mongolab.com/
    private static $_dbName = 'yiishop';
       
    public function __construct() {        
        try {
            $m = new MongoClient(self::$_connectionString);
            $dbName = self::$_dbName;
            $this->_db = $m->$dbName;            
        } catch (Exception $e) {
            
        }
    }

    public static function model($className) {
        if (isset(self::$_models[$className])) {
            //echo '<span class="label label-success">from static "'.$className.'"</span>';
            return self::$_models[$className]; }
        else {
            $model = self::$_models[$className] = new $className(null);    
            //echo '<span class="label label-important">new "'.$className.'"</span>';
            return $model;
        }
    }

}
