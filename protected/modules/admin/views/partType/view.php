<?php
/* @var $this PartTypeController */
/* @var $model PartType */

$this->breadcrumbs=array(
	'Part Types'=>array('index'),
	$model->id_part_type,
);

$this->menu=array(
	array('label'=>'List PartType', 'url'=>array('index')),
	array('label'=>'Create PartType', 'url'=>array('create')),
	array('label'=>'Update PartType', 'url'=>array('update', 'id'=>$model->id_part_type)),
	array('label'=>'Delete PartType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_part_type),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PartType', 'url'=>array('admin')),
);
?>

<h1>View PartType #<?php echo $model->id_part_type; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_part_type',
		'deskripsi_part',
	),
)); ?>
