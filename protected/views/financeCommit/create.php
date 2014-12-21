<?php

/**
 * @var $this FinanceCommitController
 * @var $model FinanceCommit
 */

?>

<a type="button" class="btn btn-link" href="/finance/view?id=<?php echo $model->finance_id; ?>">Назад</a>

<?php echo CHtml::beginForm('','post',array('style'=>'width: 560px;margin: 0 auto;')); ?>
<?php echo CHtml::errorSummary($model); ?>

    <div class="form-group">
        <label for="exampleInputEmail1">Тип</label>
        <?php echo CHtml::activeDropDownList($model, 'type', FinanceCommit::getTypes(), array('class' => 'form-control')); ?>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Сумма</label>
        <?php echo CHtml::activeNumberField($model, 'value', array('class' => 'form-control')); ?>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Описание</label>
        <?php echo CHtml::activeTextArea($model, 'description', array('class' => 'form-control')); ?>
    </div>

<?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-default')); ?>

<?php echo CHtml::endForm(); ?>