<?php

class FinanceCommit extends FinanceCommitTable
{


    const SPEND = 0;
    const ADD = 1;

    public function rules()
    {
        $oldRules = parent::rules();

        $oldRules[0] = array('finance_id, type', 'required');
        array_push($oldRules, array('create_date', 'safe'));

        return $oldRules;

    }


    public static function model($className = __CLASS__)
    {
        return parent::model($className);


    }

    public static function getTypes()
    {

        return array(FinanceCommit::SPEND => "Потратил", FinanceCommit::ADD => "Добавил");

    }


    public static function getTypeName($type)
    {
        $types = self::getTypes();

        return $types[$type];

    }

}