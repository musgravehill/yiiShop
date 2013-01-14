<?php

/**
 * This is the model class for table "{{product}}".
 *
 * The followings are the available columns in table '{{product}}':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $price
 * @property integer $stock
 * @property string $url
 */
class Product extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Product the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{product}}';
    }

    public function primaryKey() {
        return 'id';
        // Для составного первичного ключа следует использовать массив: return array('pk1', 'pk2');
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, description, price, url', 'required'),
            array('stock', 'numerical', 'integerOnly' => true),
            array('name, url', 'length', 'max' => 255),
            array('description', 'length', 'max' => 2048),
            array('price', 'length', 'max' => 9),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, description, price, stock, url', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'price' => 'Price',
            'stock' => 'Stock',
            'url' => 'Url',            
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('price', $this->price, true);
        $criteria->compare('stock', $this->stock);
        $criteria->compare('url', $this->url, true);        
        

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }
    
    public function beforeSave() {
        parent::beforeSave();        
        $this->url = $this->_bobGenerateUrl($this->name).'.html';  
        $this->lastModified = date('Y-m-d H:i:s');
        return true;
    }

    private function _bobGenerateUrl($productName) {
        $cyr  = array('а','б','в','г','д','e','ж','з','и','й','к','л','м','н','о','п','р','с','т','у', 
        'ф','х','ц','ч','ш','щ','ъ','ь', 'ы', 'ю','я','А','Б','В','Г','Д','Е','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У',
        'Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ь', 'Ы', 'Ю','Я', ' ' );
        $lat = array( 'a','b','v','g','d','e','zh','z','i','j','k','l','m','n','o','p','r','s','t','u',
        'f' ,'h' ,'ts' ,'ch','sh' ,'sht' ,'','' ,'y' ,'yu' ,'ya','a','b','v','g','d','e','zh','z','i','j','k','l','m','n','o','p','r','s','t','u',
        'f' ,'h' ,'ts' ,'ch','sh' ,'sht' ,'','' ,'y' ,'yu' ,'ya', '-' );
        $url = str_replace($cyr, $lat, $productName);
        $url = preg_replace("/[^\w\d-]*/u", '', $url);        
        return $url;
    }

}