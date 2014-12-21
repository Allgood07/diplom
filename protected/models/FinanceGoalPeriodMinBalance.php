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

    /**
     * @param $goal FinanceGoal
     */
    public function checkGoal($goal)
    {


        $today = new DateTime();
        $today->setTimestamp(time());
        $today->setTime(0,0,0);

        $dateStart = $goal->data->date_start . ' 00:00:00';
        $dateStart =  DateTime::createFromFormat('Y-m-d H:i:s', $dateStart);

        $dateEnd= $goal->data->date_end . ' 00:00:00';
        $dateEnd =  DateTime::createFromFormat('Y-m-d H:i:s', $dateEnd);

        $endInterval = $today->diff($dateEnd);

        if( $this->checkInRange($dateStart->format('Y-m-d') , $dateEnd->format('Y-m-d'), $today->format('Y-m-d') )  ){

            $minBalance = $goal->data->value;
            if($goal->finance->financeStates[0]->value < $minBalance){
                $goal->state = FinanceGoal::StateFail;
                $goal->data = json_encode($goal->data);

                return $goal->save();
            }

        }


        if($endInterval->invert == 1 || $endInterval->d == 0){

            if($goal->state == FinanceGoal::StateInProgress){
                $goal->state = FinanceGoal::StateDone;
            }
            $goal->data = json_encode($goal->data);

            return $goal->save();
        }

        return true;

    }

    public  function checkInRange($start_date, $end_date, $date_from_user)
    {
        // Convert to timestamp
        $start_ts = strtotime($start_date);
        $end_ts = strtotime($end_date);
        $user_ts = strtotime($date_from_user);

        // Check that user date is between start & end
        return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
    }

    public function getName()
    {
        return "Минимальный баланс за период";
    }

    public function getDescription()
    {
        return "Нужно иметь сумму не ниже, чем вы укажите за определённый период.\nЭто будет вас мотивировать экономить деньги каждый день";
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