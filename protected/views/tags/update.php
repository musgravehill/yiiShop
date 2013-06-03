<?php
/* @var $this TagsController */
/* @var $model Tags */

$this->breadcrumbs=array(
	'Tags'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tags', 'url'=>array('index')),
	array('label'=>'Create Tags', 'url'=>array('create')),
	array('label'=>'View Tags', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Tags', 'url'=>array('admin')),
);
?>

<h1>Update Tags <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>