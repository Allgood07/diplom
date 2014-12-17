<?php

/**
 * @var $this FinanceController
 * @var $models Finance[]
 */

?>

<?php foreach ($models as $index => $model) { ?>

    <div>
        <p>Номер:<?php echo $index + 1; ?></p>

        <p>Название: <?php echo $model->name; ?></p>

        <a href="/finance/view?id=<?php echo $model->id; ?>">Посмотреть</a>
        <br><br>
    </div>

<?php } ?>
