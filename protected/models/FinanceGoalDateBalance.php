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

    /**
     * @param $goal FinanceGoal
     * @return bool
     */
    public function checkGoal($goal)
    {
        $today = new DateTime();
        $today->setTimestamp(time());
        $today->setTime(0,0,0);

        $date = $goal->data->date . ' 00:00:00';
        $date =  DateTime::createFromFormat('Y-m-d H:i:s', $date);


        $interval = $today->diff($date);

        if( ($interval->invert == 1) ||  $interval->d == 0 ){

            $minBalance = $goal->data->value;
            if($goal->finance->financeStates[0]->value >= $minBalance){
                $goal->state = FinanceGoal::StateDone;
            }else{
                $goal->state = FinanceGoal::StateFail;
            }

            $goal->data = json_encode($goal->data);

            return $goal->save();
        }

        return true;


    }

    public function getName()
    {
        return "Баланс к дате";
    }

    public function getDescription()
    {
        return "К определённой дате нужно иметь сумму не ниже, чем вы укажите.\nЭто будет вас мотивировать планировать бюджет на долгий период";
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