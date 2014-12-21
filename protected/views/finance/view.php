<?php

/**
 * @var $this FinanceController
 * @var $model Finance
 */

?>


<a type="button" class="btn btn-link" href="/finance/list">Назад</a>

<table class="table table-bordered">
    <caption><h2>Название - <?php echo $model->name; ?> </h2></caption>

    <tbody>
    <tr>
        <td>Описание</td>
        <td><p><?php echo nl2br($model->description); ?></p></td>
    </tr>
    <tr>
        <td>Баланс</td>
        <td><p><?php echo $model->financeStates[0]->value; ?></p></td>
    </tr>

    <tr>
        <td>Изменений в балансе</td>
        <td><p><?php echo count($model->financeCommits); ?></p></td>
    </tr>

    <tr>
        <td>Задач</td>
        <td><p><?php echo count($model->financeGoals); ?></p></td>
    </tr>


    </tbody>
</table>


    <a href="/financeCommit/list?finance_id=<?php echo $model->id ?>" type="button"
       class="btn btn-primary btn-lg btn-block">
        История изменений в балансе
    </a>

<a href="/financeCommit/create?finance_id=<?php echo $model->id ?>" type="button"
   class="btn btn-primary btn-lg btn-block">
    Добавить изменения в баланс
</a>


<a href="/financeGoal/list?finance_id=<?php echo $model->id ?>" type="button" class="btn btn-primary btn-lg btn-block">
    Список задач
</a>

<a href="/financeGoal/create?finance_id=<?php echo $model->id ?>" type="button"
   class="btn btn-primary btn-lg btn-block">
    Создать задачу
</a>

