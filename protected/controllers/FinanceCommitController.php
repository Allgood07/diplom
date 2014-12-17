<?php

/**
 * Created by IntelliJ IDEA.
 * User: unknown
 * Date: 17.12.14
 * Time: 23:41
 */
class FinanceCommitController extends BaseController
{

    public function actionCreate($finance_id)
    {

        $model = new FinanceCommit();
        $model->create_date = time();
        $finance = Finance::model()->findByPk($finance_id);

        /**
         * @var $finance Finance
         */

        if ($finance->account_id != $this->Account->id) {
            return false;
        }


        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['FinanceCommit'])) {
            $model->attributes = $_POST['FinanceCommit'];
            $model->finance_id = $finance_id;
            if ($model->save()) {

                $financeState = FinanceState::model()->findByAttributes(['finance_id' => $finance_id]);

                $financeState->changeValue($model);
                if ($financeState->save()) {

                    $this->redirect('/finance/view?id=' . $model->finance_id);
                }

            }
        }

        $this->render('create', ['model' => $model]);


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

        $models = FinanceCommit::model()->findAllByAttributes(['finance_id' => $finance_id]);

        $this->render('list', ['models' => $models]);
    }


}