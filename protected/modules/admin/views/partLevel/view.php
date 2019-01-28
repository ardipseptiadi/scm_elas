<?php
/* @var $this PartLevelController */
/* @var $model PartLevel */

$this->breadcrumbs=array(
	'Part Levels'=>array('index'),
	$model->id_part_level,
);

$this->menu=array(
	array('label'=>'List PartLevel', 'url'=>array('index')),
	array('label'=>'Create PartLevel', 'url'=>array('create')),
	array('label'=>'Update PartLevel', 'url'=>array('update', 'id'=>$model->id_part_level)),
	array('label'=>'Delete PartLevel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_part_level),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PartLevel', 'url'=>array('admin')),
);
?>

<h1>View PartLevel #<?php echo $model->id_part_level; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_part_level',
		'part_level_desc',
	),
)); ?>
