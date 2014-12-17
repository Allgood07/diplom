<?php

/**
 * @var $this FinanceController
 * @var $models FinanceCommit[]
 */

?>

<?php foreach ($models as $index => $model) { ?>

    <div>
        <p>Номер:<?php echo $index + 1; ?></p>

        <p>Тип: <?php echo FinanceCommit::getTypeName($model->type); ?></p>

        <p>Сумма: <?php echo $model->value; ?></p>

        <br><br>
    </div>

<?php } ?>
