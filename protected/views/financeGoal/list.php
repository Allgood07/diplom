<?php

/**
 * @var $this FinanceController
 * @var $models FinanceGoal[]
 */

?>

<?php foreach ($models as $index => $model) { ?>

    <div>
        <p>Номер:<?php echo $index + 1; ?></p>

        <p>Название: <?php echo FinanceGoal::getType($model->type)->getName(); ?></p>

        <p>Статус: <?php echo FinanceGoal::getStateName($model->state); ?></p>

        <a href="/financeGoal/detail?id=<?php echo $model->id; ?>">Детали</a>

        <br><br><hr>
    </div>

<?php } ?>
