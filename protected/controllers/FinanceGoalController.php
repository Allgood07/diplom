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


        $this->render('create', ['types' => $goalTypes, 'financeId' => $finance_id]);


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

        /**
         * @var $goal IFinanceGoal
         */

        if (isset($_POST['Goal'])) {

            $data = $_POST['Goal'];
            $data['financeId'] = $finance_id;
            $data['type'] = $type;

            if ($goal->createNew($data)) {

                $this->redirect('/finance/view?id=' . $finance_id);

            }
        }

        $viewName = $goal->getCreateViewName();




        $this->render($viewName, ['model' => $goal , 'finance' => $finance, 'financeId' => $finance_id]);
    }

    public function actionList($finance_id)
    {

        $finance = Finance::model()->findByPk($finance_id);

        /**
         * @var $finance Finance
         */


        if ($finance->account_id != $this->Account->id) {
            return false;
        }

        $models = FinanceGoal::model()->findAllByAttributes(['finance_id' => $finance_id]);

        $this->render('list', ['models' => $models,'finance'=>$finance]);
    }


    public function actionDetail($id)
    {

        $goal = FinanceGoal::model()->findByPk($id);
        $goal->data = json_decode($goal->data);

        $finance = Finance::model()->findByPk($goal->finance_id);

        /**
         * @var $finance Finance
         */


        if ($finance->account_id != $this->Account->id) {
            return false;
        }

        $typeObj = FinanceGoal::getType($goal->type);

        $this->render( $typeObj->getDetailViewName() , ['model' => $goal]);
    }


    public function actionCheck($id)
    {

        $goal = FinanceGoal::model()->findByPk($id);
        $goal->data = json_decode($goal->data);

        $finance = Finance::model()->findByPk($goal->finance_id);

        /**
         * @var $finance Finance
         */


        if ($finance->account_id != $this->Account->id) {
            return false;
        }

        $typeObj = FinanceGoal::getType($goal->type);
        $typeObj->checkGoal($goal);
        $this->redirect('/financeGoal/detail?id='.$id);
    }

}