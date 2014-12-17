<?php 

class FinanceGoalPeriodMinBalance implements IFinanceGoal {

    public function createNew()
    {

    }

    public function checkGoal()
    {

    }


    public function getName()
    {
        return "Минимальный баланс за период";
    }

    public function getDescription()
    {
        return "Нужно иметь сумму не ниже, чем вы укажите за определённый период";
    }
}