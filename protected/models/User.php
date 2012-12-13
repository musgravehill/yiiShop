<?php

class User extends CActiveRecord {

    const ROLE_CLIENT = 'client';
    const ROLE_ADMIN = 'admin';
    public $verifyCode;

    /**
     * The followings are the available columns in table 'tbl_user':
     * @var integer $id
     * @var string $username
     * @var string $password	 
     * @var string $email
     * @var string $role
     */

    /**
     * Returns the static model of the specified AR class.
     * @return CActiveRecord the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{user}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.		
        return array(
            array('username, password, email, role', 'required'),
            array('username, password, email, role', 'length', 'max' => 128),
            array('email', 'unique'),
            array('role', 'safe'), //http://phptime.ru/blog/yii/23.html			
            array('email', 'email'),
            array('password', 'length', 'min' => 3),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('username, password, email, role', 'safe', 'on' => 'search'),
            array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(),'on'=>'register'),
        );
    }

    /**
     * Checks if the given password is correct.
     * @param string the password to be validated
     * @return boolean whether the password is valid
     */
    public function validatePassword($password) {
        return $this->hashPassword($password, $this->email) === $this->password;
    }

    /**
     * Generates the password hash.
     * @param string password
     * @param string salt
     * @return string hash
     */
    public function hashPassword($password, $salt) {
        return md5($password . $salt);
    }

    public function beforeSave() {
        parent::beforeSave();
        $this->password = md5($this->password . $this->email);
        if (!Yii::app()->user->checkAccess('changeUserRole')) {
            //if ($this->isNewRecord) { }
            $this->role = User::ROLE_CLIENT;
        }
        if ($this->role == 'register') {$this->role = User::ROLE_CLIENT;}
        return true;
    }

    public function afterSave() {
        parent::afterSave();
        $auth = Yii::app()->authManager;
        $auth->revoke(null, $this->id);
        $auth->assign($this->role, $this->id);
        $auth->save();
        return true;
    }

    public function beforeDelete() {
        parent::beforeDelete();
        $auth = Yii::app()->authManager;
        $auth->revoke($this->role, $this->id);
        $auth->save();
        return true;
    }

}