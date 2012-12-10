<?php

class UserIdentity extends CUserIdentity {

    private $_id;

    /**
     * Authenticates a user.
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        $user = User::model()->find('LOWER(username)=?', array(strtolower($this->username)));
        if ($user === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if (!$user->validatePassword($this->password))
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else {
            $this->_id = $user->id;
            $this->username = $user->username;
            //$this->setState('role', $user->role);
            $this->errorCode = self::ERROR_NONE;

            $auth = Yii::app()->authManager;
            if (!$auth->isAssigned($user->role, $this->_id)) {
                if ($auth->assign($user->role, $this->_id)) {
                    Yii::app()->authManager->save();
                }
            }
        }
        return $this->errorCode == self::ERROR_NONE;
    }

    /**
     * @return integer the ID of the user record
     */
    public function getId() {
        return $this->_id;
    }

    public function getName() {
        return $this->username;
    }

}