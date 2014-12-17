<?php
/**
 * Created by IntelliJ IDEA.
 * User: unknown
 * Date: 18.12.14
 * Time: 0:01
 */

class BaseController  extends  Controller{

    /**
     * @var Account
     */
    public $Account = null;

    function init()
    {
        $this->_getAccount();
        parent::init();
    }

    private function _getAccount()
    {
        if (!Yii::app()->user->isGuest) {
            $this->Account = Account::model()->findByPk(Yii::app()->user->id);
        }
    }


} 