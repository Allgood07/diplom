<?php

/**
 * @var $this FinanceController
 * @var $model FinanceGoal
 */

?>

    <div>
        <p>Название: <?php echo FinanceGoal::getType($model->type)->getName(); ?></p>


        <p>Описание: <?php echo FinanceGoal::getType($model->type)->getDescription(); ?></p>

        <p>Описание пользователя: <?php echo nl2br( $model->description );?></p>

        <p>Статус: <?php echo FinanceGoal::getStateName($model->state); ?></p>

        <p>Дата окончания: <?php echo $model->data->date; ?></p>

        <p>Сумма: <?php echo $model->data->value; ?></p>

        <a href="/financeGoal/check?id=<?php echo $model->id; ?>">Проверить</a>

        <br><br><hr>
    </div>
