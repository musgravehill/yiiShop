<h1>Регистрация</h1>
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-register-form',
	'enableAjaxValidation'=>true,
        'htmlOptions' => array('class'=>'form-horizontal span8 well',),
)); ?>
       
		<?php echo $form->labelEx($model,'username',array('class'=>'span1')); ?>
		<?php echo $form->textField($model,'username',array('class'=>'span2')); ?>
		<?php echo $form->error($model,'username',array('class'=>'pull-right label label-important')); ?>
	        <br>
		<?php echo $form->labelEx($model,'password',array('class'=>'span1')); ?>
		<?php echo $form->passwordField($model,'password',array('class'=>'span2')); ?>
		<?php echo $form->error($model,'password',array('class'=>'pull-right label label-important')); ?>
	<br>
		<?php echo $form->labelEx($model,'email',array('class'=>'span1')); ?>
		<?php echo $form->textField($model,'email',array('class'=>'span2')); ?>
		<?php echo $form->error($model,'email',array('class'=>'pull-right label label-important')); ?>
        <br>
        
        <?php if(CCaptcha::checkRequirements()): ?>	
		<?php echo $form->labelEx($model,'Я не бобот',array('class'=>'span1')); ?>
		<?php echo $form->textField($model,'verifyCode',array('class'=>'span2')); ?>
		<?php $this->widget('CCaptcha', array('buttonLabel'=>'другая каптча','imageOptions'=>array('class'=>''),'buttonOptions'=>array('class'=>'muted'))); 
                ?>
		
		<?php echo $form->error($model,'verifyCode',array('class'=>'pull-right label label-important')); 
                ?>
	
	<?php endif; ?>
	<br><br>
		<?php echo CHtml::submitButton('зарегистрироваться',array('class'=>'btn btn-success')); ?>
	

<?php $this->endWidget(); ?>

<?php if ($regReady) { 
    echo '<div class="alert alert-success span3">
            <button type="button" class="close" data-dismiss="alert">&times;</button> 
            Регистрация успешно завершена!
          </div>';
    
} ?>