<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1 class="span12">Login</h1>




<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
        'htmlOptions' => array('class'=>' span4 well',),
)); ?>

	

	
		<?php echo $form->labelEx($model,'email',array('class'=>'span1')); ?>
		<?php echo $form->textField($model,'email',array('class'=>'span2')); ?>
		<?php echo $form->error($model,'email',array('class'=>'pull-right label label-important')); ?>
	<br>

	
		<?php echo $form->labelEx($model,'password',array('class'=>'span1')); ?>
		<?php echo $form->passwordField($model,'password',array('class'=>'span2')); ?>
		<?php echo $form->error($model,'password',array('class'=>'pull-right label label-important')); ?>
		
	<br>
		<?php echo $form->checkBox($model,'rememberMe',array('class'=>'span1')); ?>
		<?php echo $form->label($model,'rememberMe',array('class'=>'span2')); ?>
		<?php echo $form->error($model,'rememberMe',array('class'=>'pull-right label label-important')); ?>
	
<br><br>
	
		<?php echo CHtml::submitButton('Login',array('class'=>'btn btn-success')); ?>
	

<?php $this->endWidget(); ?>

