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
            array('name, description, price,stock', 'required'),
            array('stock', 'numerical', 'integerOnly' => true),
            array('name, url', 'length', 'max' => 255),
            array('description', 'length', 'max' => 4048),
            array('description', 'safe'),
            array('price', 'length', 'max' => 9),
            array('image', 'file', 'types' => 'jpg', 'maxSize' => 1048576, 'allowEmpty' => true, 'on' => 'insert,update'),
            //array('url','unique'),  not possible cause Rules filter user-input, but not a generated data. 
            //Url generated in beforeSave and can`t be filtered by Rules         
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
        $this->url = $this->_bobGenerateUrl($this->name) . '.html';
        $this->description = str_replace(array('script', 'css'), '', $this->description);
        $this->lastModified = date('Y-m-d H:i:s');  //in_update trigger in mysql doesnot work with AR
        if (($this->scenario == 'insert' || $this->scenario == 'update') && ($imageCUploadedFile = CUploadedFile::getInstance($this, 'image'))) {
            $imageName = str_replace('.html', '.jpg', $this->url); //imageUrl like product name like url =)
            $this->image = $imageName;
            $ImageProcessor = new ImageProcessor();
            $ImageProcessor->saveProductImage($imageCUploadedFile, $imageName);
        }
        return true;
    }

    private function _bobGenerateUrl($productName) {
        $cyr = array('а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у',
            'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ь', 'ы', 'ю', 'я', 'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У',
            'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ь', 'Ы', 'Ю', 'Я', ' ');
        $lat = array('a', 'b', 'v', 'g', 'd', 'e', 'e', 'zh', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u',
            'f', 'h', 'ts', 'ch', 'sh', 'sht', '', '', 'y', 'yu', 'ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'zh', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u',
            'f', 'h', 'ts', 'ch', 'sh', 'sht', '', '', 'y', 'yu', 'ya', '-');
        $url = str_replace($cyr, $lat, $productName);
        $url = preg_replace("/[^\w\d-]*/Uu", '', $url);
        return $url;
    }

    public function getPriceMax() {
        $db = Yii::app()->db;
        $product_table = Product::tableName();
        $sql = "SELECT max(price) as maxPrice FROM {$product_table} ";
        $command = $db->createCommand($sql);
        $dataReader = $command->query();
        $row = $dataReader->read();
        return $row['maxPrice'];
    }

    public function beforeDelete() {
        parent::beforeDelete();
        $ImageProcessor = new ImageProcessor();
        $ImageProcessor->deleteProductImage($this->image); //unlink src & product images
        return true;
    }

}