<?php

/**
 * @var $this FinanceController
 * @var $model Finance
 */

?>


<?php echo CHtml::beginForm(); ?>
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