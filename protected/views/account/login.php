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
        'class' => 'form-signin',
        'role' => 'form'
    ),
)); ?>

<h2 class="form-signin-heading">Войти</h2>
<?php echo $form->error($model, 'email'); ?>
<?php echo $form->error($model, 'pass'); ?>
<label for="inputEmail" class="sr-only">Почта</label>
<?php echo $form->emailField($model, 'email', array('class' => 'form-control')); ?>

<label for="inputPassword" class="sr-only">Пароль</label>

<?php echo $form->passwordField($model, 'pass', array('class' => 'form-control')); ?>

<a href="/account/reg">Регистрация</a>

<?php echo CHtml::submitButton('Зайти', array('class' => 'btn btn-lg btn-primary btn-block')); ?>




<?php $this->endWidget(); ?>
</div><!-- form -->
