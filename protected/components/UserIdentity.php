<?php

class UserIdentity extends CUserIdentity
{
    private $_id;

    public function authenticate()
    {

        if (!$user = Account::model()->findByAttributes(['email' => $this->username])) {

            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } elseif (!$user->checkPass($this->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            $this->_id = $user->id;

            $this->setState('timezone',  $user->getAttribute('timezone') );
            $this->errorCode = self::ERROR_NONE;
        }

        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->_id;
    }
}