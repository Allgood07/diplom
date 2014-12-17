<?php

class FinanceGoal extends FinanceGoalTable{


    const  DateBalance = 0;
    const  PeriodMinBalance = 1;


    public static function model($className = __CLASS__)
    {
        return parent::model($className);

    }

    /**
     * @return IFinanceGoal[]
     */
    public static function getTypes()
    {
        return array(

            self::DateBalance => new FinanceGoalDateBalance(),
            self::PeriodMinBalance => new FinanceGoalPeriodMinBalance(),
        );
    }


    /**
     * @param $type
     * @return IFinanceGoal
     */
    public static function getType($type)
    {
        $types = self::getTypes();
        return $types[$type];

    }


}