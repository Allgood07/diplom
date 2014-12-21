<?php

/**
 * @var $this FinanceCommitController
 * @var $model IFinanceGoal
 * @var $finance Finance
 */

?>

    <a type="button" class="btn btn-link" href="/financeGoal/create?finance_id=<?php echo $financeId; ?>">Назад</a>

<?php echo CHtml::beginForm('','post',array('style'=>'width: 560px;margin: 0 auto;')); ?>
    <div class="form-group">
        <label for="exampleInputEmail1">Описание задачи:</label>
        <p><?php echo nl2br($model->getDescription()); ?></p>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Дата начала:</label>
        <?php echo CHtml::dateField('Goal[date_start]', CDateHelper::getFullDate() , array('class' => 'form-control') ); ?>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Дата окончания:</label>
        <?php echo CHtml::dateField('Goal[date_end]', CDateHelper::getFullDate() , array('class' => 'form-control') ); ?>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Необходимая сумма:</label>
        <?php echo CHtml::numberField('Goal[value]', $finance->financeStates[0]->value , array('class' => 'form-control'));  ?>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Ваше описание</label>
        <?php echo CHtml::textArea('Goal[description]', '' , array('class' => 'form-control'));  ?>
    </div>

<?php echo CHtml::submitButton('Создать задачу', array('class' => 'btn btn-default')); ?>

<?php echo CHtml::endForm(); ?>