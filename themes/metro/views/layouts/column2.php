<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span9">
	
		<?php echo $content; ?>
	
</div>
<div class="span2">           
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Действия:',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>''),
		));
		$this->endWidget();
	?>
	
</div>
<?php $this->endContent(); ?>