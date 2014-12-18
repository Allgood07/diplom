<?php

/**
 * @var $this FinanceCommitController
 * @var $model IFinanceGoal
 */

?>

<div class="form">
    <?php echo CHtml::beginForm(); ?>

    <div class="row">
        <p>Дата окончания: </p>
        <?php echo CHtml::dateField('Goal[date]', CDateHelper::getFullDate(strtotime("+1 months", time())) ,array('type'=>"date") ); ?>
    </div>


    <div class="row">
        <p>Необходимая сумма: </p>
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