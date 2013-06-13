<h1>Регистрация</h1>
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-register-form',
	'enableAjaxValidation'=>true,
        'htmlOptions' => array('class'=>'span5 well',),
)); ?>
       
		<?php echo $form->labelEx($model,Yii::t('user','username'),array('class'=>'span1')); ?>
		<?php echo $form->textField($model,'username',array('class'=>'span2')); ?>
		<?php echo $form->error($model,'username',array('class'=>'pull-right label label-important')); ?>
	        <br>
		<?php echo $form->labelEx($model,Yii::t('user','password'),array('class'=>'span1')); ?>
		<?php echo $form->passwordField($model,'password',array('class'=>'span2')); ?>
		<?php echo $form->error($model,'password',array('class'=>'pull-right label label-important')); ?>
	<br>
		<?php echo $form->labelEx($model,Yii::t('user','email'),array('class'=>'span1')); ?>
		<?php echo $form->textField($model,'email',array('class'=>'span2')); ?>
		<?php echo $form->error($model,'email',array('class'=>'pull-right label label-important')); ?>
        <br>
        
        <?php if(CCaptcha::checkRequirements()): ?>	
		<?php echo $form->labelEx($model,Yii::t('user','I`m not a bobot'),array('class'=>'span1')); ?>
		<?php echo $form->textField($model,'verifyCode',array('class'=>'span2')); ?>
                <div class="pull-right">
		<?php $this->widget('CCaptcha', array('buttonLabel'=>Yii::t('user','another captcha'),'imageOptions'=>array('class'=>'thumbnail'),'buttonOptions'=>array('class'=>'muted'))); ?>
                </div>
		
		<?php echo $form->error($model,'verifyCode',array('class'=>'pull-right span2 label label-important')); 
                ?>
	
	<?php endif; ?>
	<br><br>
		<?php echo CHtml::submitButton(Yii::t('user','Register'),array('class'=>'btn btn-success')); ?>
	

<?php $this->endWidget(); ?>

<?php if ($regReady) { 
    echo '<div class="alert alert-success span3">
            <button type="button" class="close" data-dismiss="alert">&times;</button> 
            '.Yii::t('user','Register successfull!').'
          </div>';
    
} ?>
