<?php 

class FinanceGoalPeriodMinBalance implements IFinanceGoal {

    public function createNew($data)
    {
        $goal = new FinanceGoal();
        $goal->create_date  = time();
        $goal->description = $data['description'];
        $goal->finance_id = $data['financeId'];
        $goal->type = $data['type'];
        $goal->state = FinanceGoal::StateInProgress;

        $goalDate = [];
        $goalDate['date_start'] = $data['date_start'];
        $goalDate['date_end'] = $data['date_end'];
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
        return "Минимальный баланс за период";
    }

    public function getDescription()
    {
        return "Нужно иметь сумму не ниже, чем вы укажите за определённый период";
    }

    public function getCreateViewName()
    {
        return "createPeriodMinBalance";
    }

    public function getDetailViewName()
    {
        return "detailPeriodMinBalance";

    }
}