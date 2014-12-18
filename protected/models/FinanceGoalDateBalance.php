<?php

class FinanceGoalDateBalance implements IFinanceGoal {


    public function createNew($data){

        $goal = new FinanceGoal();
        $goal->create_date  = time();
        $goal->description = $data['description'];
        $goal->finance_id = $data['financeId'];
        $goal->type = $data['type'];
        $goal->state = FinanceGoal::StateInProgress;

        $goalDate = [];
        $goalDate['date'] = $data['date'];
        $goalDate['value'] = $data['value'];

        $jsonGoalDate = json_encode($goalDate);
        $goal->data  = $jsonGoalDate;

        return $goal->save();

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

    public function getCreateViewName()
    {
        return "createDateBalance";
    }

    public function getDetailViewName()
    {
        return "detailDateBalance";

    }
}