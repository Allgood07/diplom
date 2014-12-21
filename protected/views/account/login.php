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

<label for="inputEmail" >Почта</label>
<?php echo $form->error($model, 'email'); ?>
<?php echo $form->emailField($model, 'email', array('class' => 'form-control')); ?>

<label for="inputPassword" >Пароль</label>
<?php echo $form->error($model, 'pass'); ?>
<?php echo $form->passwordField($model, 'pass', array('class' => 'form-control')); ?>

<a href="/account/reg">Регистрация</a>

<?php echo CHtml::submitButton('Зайти', array('class' => 'btn btn-lg btn-primary btn-block')); ?>




<?php $this->endWidget(); ?>
</div><!-- form -->
