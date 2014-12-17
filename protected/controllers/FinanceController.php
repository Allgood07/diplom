<?php
/**
 * Created by IntelliJ IDEA.
 * User: unknown
 * Date: 17.12.14
 * Time: 23:41
 */

class FinanceController extends BaseController {

    public function actionCreate(){

        $model = new Finance();

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['Finance'])) {
            $model->attributes = $_POST['Finance'];
            $model->create_date = time();
            $model->account_id = $this->Account->id;



            if ($model->save()) {


                $financeState = new FinanceState();
                $financeState->value = 0;
                $financeState->finance_id = $model->id;

                if($financeState->save()){

                    $this->redirect('/finance/view?id='.$model->id);
                }


            }
        }

        $this->render('create', ['model' => $model]);


    }

    public function actionList(){

        $models = Finance::model()->findAllByAttributes(['account_id' => $this->Account->id]);

        $this->render('list', ['models' => $models]);
    }


    public function actionView($id = null){

        $model = Finance::model()->findByPk($id);

        $this->render('view', ['model' => $model]);
    }



} 