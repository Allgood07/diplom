<?php

/**
 * @var $this FinanceCommitController
 * @var $model IFinanceGoal
 * @var $finance Finance
 */

?>

<div class="form">
    <?php echo CHtml::beginForm(); ?>

    <div class="row">
        <p>Начало: </p>
        <?php echo CHtml::dateField('Goal[date_start]',  CDateHelper::getFullDate(), array('type'=>"date")); ?>
    </div>

    <div class="row">
        <p>Окончание: </p>
        <?php echo CHtml::dateField('Goal[date_end]', CDateHelper::getFullDate() ,array('type'=>"date") ); ?>
    </div>


    <div class="row">
        <p>Минимальная сумма: </p>
        <?php echo CHtml::numberField('Goal[value]', $finance->financeStates[0]->value);  ?>
    </div>

    <div class="row">
        <p>Описание: </p>
        <?php echo CHtml::textArea('Goal[description]', '');  ?>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton('Создать задачу'); ?>
    </div>

    <?php echo CHtml::endForm(); ?>
</div><!-- form -->