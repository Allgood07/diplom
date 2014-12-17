<?php


class Finance  extends FinanceTable{


    public function rules()
    {
        $oldRules = parent::rules();

        $oldRules[0] = array('name', 'required');
        array_push($oldRules, array('create_date,account_id', 'safe'));

        return $oldRules;

    }


    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }




} 