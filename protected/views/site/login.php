<?php

/**
 * @var $this SiteController
 * @var $model LoginForm
 * @var $form BootstrapLoginForm
 */

$this->pageTitle = Yii::app()->name;

?>

<div>
<?php $form = $this->beginWidget('BootstrapLoginForm', array(
    'id' => 'login-form',
    'enableClientValidation' => false,
    'clientOptions' => array('validateOnSubmit' => true),
)); ?>

    <h2 class="form-signin-heading"><?php echo Yii::t('login', 'Please Sign in'); ?></h2>
    <?php echo $form->errorSummary($model, '', ''); ?>

    <?php echo $form->textField($model, 'username', array('placeholder' => Yii::t('login', 'E-mail address'), 'autofocus' => 1)); ?>
    <?php echo $form->passwordField($model, 'password', array('placeholder' => Yii::t('login', 'Password'))); ?>

    <label class="checkbox">
        <?php echo $form->checkBox($model, 'rememberMe'); ?> <?php echo $model->getAttributeLabel('rememberMe'); ?>
    </label>

    <?php echo $form->submitButton(Yii::t('login', 'Sign in')); ?>
<?php $this->endWidget(); ?>
</div>
