<?php

class Account extends AccountTable
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }


    public function attributeLabels()
    {

        $oldLabels = parent::attributeLabels();

        $newLabels =  array(
            'id' => 'ID',
            'email' => 'Почта',
            'pass' => 'Пароль',
            'salt' => 'Salt',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'reg_date' => 'Дата регистрации',
            'is_admin' => 'Администратор ?',
        );

        $newLabels = array_merge($oldLabels,$newLabels);

        return $newLabels;
    }

    public function rules()
    {
        $oldRules = parent::rules();

        $oldRules[0] = array('email, pass', 'required');
        $oldRules[3] = array('pass', 'length', 'max' => 32);
        array_push($oldRules, array('salt', 'safe'));
        array_push($oldRules,   array('email', 'unique','message'=>'Такая почта уже занята!', 'on'=>'reg') );

        array_push($oldRules,  array('first_name, last_name', 'required', 'on'=>'reg'));
        return $oldRules;

    }

    public function uniqueEmail($attribute, $params)
    {
        // Set $emailExist variable true or false by using your custom query on checking in database table if email exist or not.
        // You can user $this->{$attribute} to get attribute value.

        $emailExist = true;

        if($emailExist)
            $this->addError('email','Email already exists');
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
        }
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