<?php

/**
 * @var $this FinanceCommitController
 * @var $model FinanceCommit
 */

?>

<div class="form">
    <?php echo CHtml::beginForm(); ?>

    <?php echo CHtml::errorSummary($model); ?>


    <div class="row">
        <?php echo CHtml::activeLabel($model, 'type'); ?>
        <?php echo CHtml::activeDropDownList($model, 'type', FinanceCommit::getTypes()); ?>
    </div>


    <div class="row">
        <?php echo CHtml::activeLabel($model, 'value'); ?>
        <?php echo CHtml::activeTextField($model, 'value'); ?>
    </div>


    <div class="row">
        <?php echo CHtml::activeLabel($model, 'description'); ?>
        <?php echo CHtml::activeTextArea($model, 'description'); ?>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton('Создать изменения'); ?>
    </div>

    <?php echo CHtml::endForm(); ?>
</div><!-- form -->