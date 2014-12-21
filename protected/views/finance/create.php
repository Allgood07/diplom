<?php

/**
 * @var $this FinanceController
 * @var $model Finance
 */

?>


    <a type="button" class="btn btn-link" href="/finance/list">Назад</a>

<?php echo CHtml::beginForm('','post',array('style'=>'width: 560px;margin: 0 auto;')); ?>
<?php echo CHtml::errorSummary($model); ?>

    <div class="form-group">
        <label for="exampleInputEmail1">Название проекта</label>
        <?php echo CHtml::activeTextField($model, 'name', array('class' => 'form-control')); ?>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Описание проекта</label>
        <?php echo CHtml::activeTextArea($model, 'description', array('class' => 'form-control')); ?>
    </div>

<?php echo CHtml::submitButton('Создать', array('class' => 'btn btn-default')); ?>

<?php echo CHtml::endForm(); ?>