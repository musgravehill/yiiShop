<?php

class User extends CActiveRecord {

    const ROLE_CLIENT = 'client';
    const ROLE_ADMIN = 'admin';

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
            array('password', 'length', 'min' => 5),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('username, password, email, role', 'safe', 'on' => 'search'),
        );
    }

    /**
     * Checks if the given password is correct.
     * @param string the password to be validated
     * @return boolean whether the password is valid
     */
    public function validatePassword($password) {
        return $this->hashPassword($password, $this->username) === $this->password;
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

    //////////////////////TODO//////////////////////////////////////////
    public function beforeSave() {
        parent::beforeSave();
        $this->u_pass = md5($this->u_pass . $this->username);

        if (!Yii::app()->user->checkAccess('changeRole')) {
            if ($this->isNewRecord) {
                $this->u_role = Users::ROLE_CLIENT;
            }
        }
        return true;
    }

    public function afterSave() {
        parent::afterSave();
        $auth = Yii::app()->authManager;
        $auth->revoke(null, $this->u_id);
        $auth->assign($this->u_role, $this->u_id);
        $auth->save();
        return true;
    }

    public function beforeDelete() {
        parent::beforeDelete();
        $auth = Yii::app()->authManager;
        $auth->revoke($this->u_role, $this->u_id);
        $auth->save();
        return true;
    }

}