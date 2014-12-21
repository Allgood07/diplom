<?php

/**
 * @var $this FinanceController
 * @var $model FinanceGoal
 */

?>

<a type="button" class="btn btn-link" href="/financeGoal/list?finance_id=<?php echo $model->finance_id; ?>">Назад
</a>


<table class="table table-bordered">
    <caption><h2>Название -  <?php echo FinanceGoal::getType($model->type)->getName(); ?> </h2></caption>

    <tbody>
    <tr>
        <td>Описание</td>
        <td><p><?php echo FinanceGoal::getType($model->type)->getDescription(); ?></p></td>
    </tr>
    <tr>
        <td>Описание пользователя:</td>
        <td><p> <?php echo nl2br($model->description); ?></p></td>
    </tr>

    <tr>
        <td>Статус</td>
        <td><p><?php echo FinanceGoal::getStateName($model->state); ?></p></td>
    </tr>

    <tr>
        <td>Дата окончания</td>
        <td><p><?php echo $model->data->date; ?></p></td>
    </tr>


    <tr>
        <td>Сумма</td>
        <td><p><?php echo $model->data->value; ?></p></td>
    </tr>


    <?php if ($model->state == FinanceGoal::StateInProgress) { ?>
        <tr>
            <td></td>
            <td><a href="/financeGoal/check?id=<?php echo $model->id; ?>">Проверить</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>