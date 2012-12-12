<?php

class Product extends CActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /** SAVE() автоматом вызовет проверку этих правил  */
    public function rules() {
        return array(
            array('name,price,url', 'required'),
            array('name,url', 'length', 'max' => 255),
            array('description', 'length', 'max' => 2048),            
            array('url', 'unique'),
        );
    }

    public function tableName() {
        return '{{product}}';
    }

    public function primaryKey() {
        return 'id';
        // Для составного первичного ключа следует использовать массив: return array('pk1', 'pk2');
    }

    public function beforeSave() {
        parent::beforeSave();        
        $this->url = $this->_bobGenerateUrl($this->name);
        return true;
    }

    private function _bobGenerateUrl($productName) {
        $cyr  = array('а','б','в','г','д','e','ж','з','и','й','к','л','м','н','о','п','р','с','т','у', 
        'ф','х','ц','ч','ш','щ','ъ','ь', 'ю','я','А','Б','В','Г','Д','Е','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У',
        'Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ь', 'Ю','Я', ' ' );
        $lat = array( 'a','b','v','g','d','e','zh','z','i','y','k','l','m','n','o','p','r','s','t','u',
        'f' ,'h' ,'ts' ,'ch','sh' ,'sht' ,'a' ,'y' ,'yu' ,'ya','A','B','V','G','D','E','Zh',
        'Z','I','Y','K','L','M','N','O','P','R','S','T','U',
        'F' ,'H' ,'Ts' ,'Ch','Sh' ,'Sht' ,'A' ,'Y' ,'Yu' ,'Ya', '-' );
        $url = str_replace($cyr, $lat, $productName);
        $url = preg_replace("/[^\w\d-]*/Uu", '', $url);        
        return $url.'.html';
    }

}