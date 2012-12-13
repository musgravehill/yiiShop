<?php

/**
 * This is the model class for table "{{cart}}".
 *
 * The followings are the available columns in table '{{cart}}':
 * @property integer $id
 * @property integer $product_id
 * @property integer $user_id
 * @property integer $quantity
 * @property string $date_add
 */
class Cart extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Cart the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{cart}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('product_id, user_id, quantity, session_id', 'required'),
            array('product_id, user_id, quantity', 'numerical', 'integerOnly' => true),
            array('quantity', 'compare', 'operator' => '>', 'compareValue' => '0'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, product_id, user_id, quantity, date_add,session_id', 'safe', 'on' => 'search'),
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
            'product_id' => 'ProductID',
            'user_id' => 'UserID',
            'quantity' => 'Quantity',
            'date_add' => 'Date Add',
            'session_id' => 'SessionID',
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
        $criteria->compare('product_id', $this->product_id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('quantity', $this->quantity);
        $criteria->compare('date_add', $this->date_add, true);
        $criteria->compare('session_id', $this->session_id, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function beforeSave() {
        parent::beforeSave();
        return true;
    }

    public function addTocart($postData) {
        $postData['user_id'] = (integer) Yii::app()->user->id;
        $postData['session_id'] = session_id();
        $itemInCart = Cart::model()->find(
                array(
                    "condition" => " 
                            (product_id = " . (integer) $postData['product_id'] . ") 
                        AND 
                            (      ( user_id = " . (integer) $postData['user_id'] . " AND user_id > 0) 
                                OR 
                                   ( session_id = '" . $postData['session_id'] . "' )
                            )   ",
                    "limit" => 1,
                )
        );
        if (isset($itemInCart)) {
            $itemInCart->quantity += $postData['quantity'];
        } else {
            $itemInCart = new Cart();
            $itemInCart->attributes = $postData;
        }
        $itemInCart->save() ? $result = true : $result = false;
        return $result;
    }

    /** call it after Authentificate (i already have user_id) && before user->Login(session_id isnt regenerated yet) */
    public function setUserIDbySessionIDinCart($user_id, $session_id) {
        $criteria = new CDbCriteria;
        //$criteria->addInCondition( "wall_id" , $wall_ids ) ; // $wall_ids = array ( 1, 2, 3, 4 );
        $criteria->addCondition("user_id = 0");
        $criteria->addCondition("session_id = '$session_id'");
        Cart::model()->updateAll(array('user_id' => (integer) $user_id), $criteria);
        return true;
    }

    public function viewMyCart($user_id, $session_id) {
        $db = Yii::app()->db;
        $cart_table = Cart::tableName();
        $product_table = Product::model()->tableName();

        $sql = "SELECT * FROM {$cart_table},{$product_table} WHERE
            {$cart_table}.product_id = {$product_table}.id     AND      
            (      ( {$cart_table}.user_id =:user_id AND user_id > 0) 
                OR 
                    ( {$cart_table}.session_id =:session_id )
            )            
            LIMIT 1000";
        $command = $db->createCommand($sql);
        $command->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        $command->bindParam(":session_id", $session_id, PDO::PARAM_STR);
        $rows = $command->queryAll();
        return $rows;
    }

    //user add product to cart by UserID. Then LogOut and add to cart the same product by SessionID. 
    //And then Login - SessionID bind with UserID. User has double product. To prevent this ->
    public function mergeCart($user_id) {
        //select summary by user_id
        $db = Yii::app()->db;
        $cart_table = Cart::tableName();
        $sql = "SELECT *, SUM(quantity) as sum_quantity FROM {$cart_table} WHERE            
            {$cart_table}.user_id =:user_id    
            GROUP BY product_id ";
        $command = $db->createCommand($sql);
        $command->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        $summaryCart = $command->queryAll();
        //clear cart
        Cart::model()->deleteAll('user_id = ? ', array((integer) $user_id));
        //insert summary information
        foreach ($summaryCart as $item) {
            $Cart = new Cart();
            $item['quantity'] = $item['sum_quantity'];
            $Cart->attributes = $item;
            $Cart->save();
        }
        return true;
    }
    
    public function clearCart($user_id) {
        Cart::model()->deleteAll('user_id = ? ', array((integer) $user_id));
    }

}