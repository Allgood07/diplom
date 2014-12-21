<?php

class CronCommand extends CConsoleCommand
{


    public function actionCheckGoals()
    {

        $models = FinanceGoal::model()->findAllByAttributes(['state'=>FinanceGoal::StateInProgress]);
        /**
         * @var $models FinanceGoal[]
         */
        foreach($models as $model){
            $model->data = json_decode($model->data);
            $typObj = $model->getType($model->type);

            echo "\nCheck model - " . $model->id;
            $typObj->checkGoal($model);


        }

        echo "\ndone!\n";


    }

}

