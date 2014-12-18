<?php

class FinanceGoal extends FinanceGoalTable{


    const  DateBalance = 0;
    const  PeriodMinBalance = 1;


    const StateInProgress = 0;
    const StateDone = 1;
    const StateFail = 2;

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

    public static function getStates()
    {

        return array(

            self::StateDone => "Выполнена",
            self::StateFail => "Провалена",
            self::StateInProgress => "В Процессе",

        );

    }

    public static function getStateName($state)
    {

        $states = self::getStates();
        return $states[$state];

    }


}