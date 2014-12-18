<?php

/**
 * @var $this FinanceController
 * @var $model Finance
 */

?>

<div>
    <p>Название: <?php echo $model->name; ?></p>
    <p>Создатель: <?php echo $model->account->first_name . " " . $model->account->last_name; ?></p>
    <p>Описание: <?php echo $model->description; ?></p>
    <p>Баланс: <?php echo $model->financeStates[0]->value; ?></p>
    <p><a href="/financeCommit/create?finance_id=<?php echo $model->id?>">Изменить</a></p>
    <p><a href="/financeGoal/create?finance_id=<?php echo $model->id?>">Создать задачу</a></p>
    <p><a href="/financeGoal/list?finance_id=<?php echo $model->id?>">Список задач</a></p>
    <p><a href="/financeCommit/list?finance_id=<?php echo $model->id?>">Детали</a></p>
</div>