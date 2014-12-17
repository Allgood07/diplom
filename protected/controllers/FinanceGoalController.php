<?php

class FinanceGoalController extends BaseController
{

    public function actionCreate($finance_id)
    {

        $model = new FinanceGoal();
        $model->create_date = time();
        $finance = Finance::model()->findByPk($finance_id);

        /**
         * @var $finance Finance
         */

        if ($finance->account_id != $this->Account->id) {
            return false;
        }


        $goalTypes = FinanceGoal::getTypes();


        $this->render('create', ['types' => $goalTypes]);


    }

    public function actionCreateByType($type , $finance_id)
    {

        $finance = Finance::model()->findByPk($finance_id);

        /**
         * @var $finance Finance
         */


        if ($finance->account_id != $this->Account->id) {
            return false;
        }


        $goal = FinanceGoal::getType($type);

        if (isset($_POST[get_class($goal)])) {

            $goal->attributes = $_POST[get_class($goal)];


            if ($goal->createNew()) {


                $this->redirect('/finance/view?id=' . $finance_id);

            }
        }




        $models = FinanceCommit::model()->findAllByAttributes(['finance_id' => $finance_id]);

        $this->render('list', ['models' => $models]);
    }


}