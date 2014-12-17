<?php

/**
 * @var $this FinanceController
 * @var $model Finance
 */

?>

<div class="form">
    ЕБАТЬ ФИНАНСЫ
    <?php echo CHtml::beginForm(); ?>

    <?php echo CHtml::errorSummary($model); ?>

    <div class="row">
        <?php echo CHtml::activeLabel($model, 'name'); ?>
        <?php echo CHtml::activeTextField($model, 'name'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model, 'description'); ?>
        <?php echo CHtml::activeTextField($model, 'description'); ?>
    </div>



    <div class="row submit">
        <?php echo CHtml::submitButton('Создать'); ?>
    </div>

    <?php echo CHtml::endForm(); ?>
</div><!-- form -->