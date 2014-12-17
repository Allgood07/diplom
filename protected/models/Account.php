<?php

class Account extends AccountTable
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function rules()
    {
        $oldRules = parent::rules();

        $oldRules[0] = array('email, pass', 'required');
        $oldRules[3] = array('pass', 'length', 'max' => 32);
        array_push($oldRules, array('salt', 'safe'));

        return $oldRules;

    }


    public function login()
    {
        $identity = new UserIdentity($this->email, $this->pass);

        if ($identity->authenticate()) {
            Yii::app()->user->login($identity, 31104000);
            return true;
        } else {
            $this->addError('pass', 'Неправильный email или пароль.');
            return false;
        };
    }

    public function checkPass($password)
    {
        return $this->pass == Account::passHash($password, $this->salt);
    }

    public static function passHash($pass, $salt)
    {
        return md5(
            md5($pass . $salt) . md5($salt)
        );
    }

    public function beforeSave()
    {
        if ($this->isNewRecord) {
            $this->salt = self::genSalt();
            $this->pass = self::passHash($this->pass, $this->salt);
            $this->reg_date = time();
        }

        return true;
    }

    public static function genSalt($length = 15)
    {
        $salt = '';
        $chars = '1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
        $charsLength = strlen($chars);

        for ($i = 0; $i < $length; $i++)
            $salt .= $chars[rand(0, $charsLength - 1)];

        return $salt;
    }


} 