<?php

/**
 * @var $this AccountController
 * @var $model Account
 */

?>


<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm */

?>




<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'login-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions' => array(
        'class' => 'form-signin signup-form',
        'role' => 'form'
    ),
)); ?>

<h2 class="form-signin-heading">Регистрация</h2>
<?php echo CHtml::errorSummary($model); ?>

<label >Почта</label>
<?php echo $form->emailField($model, 'email', array('class' => 'form-control')); ?>

<label>Пароль</label>

<?php echo $form->passwordField($model, 'pass', array('class' => 'form-control')); ?>


<label >Имя</label>

<?php echo $form->textField($model, 'first_name', array('class' => 'form-control')); ?>


<label  >Фамилия</label>

<?php echo $form->textField($model, 'last_name', array('class' => 'form-control')); ?>


<?php echo CHtml::submitButton('Зарегистрироваться', array('class' => 'btn btn-lg btn-primary btn-block')); ?>




<?php $this->endWidget(); ?>
</div><!-- form -->

<style>

    .signup-form label{
        height: 20px;;
    }
</style>
