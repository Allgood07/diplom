<?php

class FinanceGoalDateBalance implements IFinanceGoal {


    public function createNew()
    {

    }

    public function checkGoal()
    {

    }

    public function getName()
    {
        return "Баланс к дате";
    }

    public function getDescription()
    {
        return "Нужно иметь сумму не ниже, чем вы укажите к определённой дате";
    }
}