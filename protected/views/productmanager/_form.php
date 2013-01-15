<?php
/* @var $this ProductController */
/* @var $model Product */
/* @var $form CActiveForm */
?>

<div class="form">

<?php
Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget');
$this->widget('ImperaviRedactorWidget', array(    
    'selector' => '.redactor',    
    'options' => array(
        'lang' => 'ru',        
        'iframe' => false,
        'autoresize'=> true,
        'css' => 'wym.css',
    ),
));

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255,'class'=>'input-xxlarge')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('maxlength'=>4048,'class'=>'redactor')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stock'); ?>
		<?php echo $form->textField($model,'stock',array('placeholder'=>'0=backorder 1..999=inStock')); ?>
		<?php echo $form->error($model,'stock'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'url'); 
                ?>
		<?php echo $form->hiddenField($model,'url',array('size'=>60,'maxlength'=>255,'value'=>'generated by name')); ?>
		<?php //echo $form->error($model,'url'); 
                ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->