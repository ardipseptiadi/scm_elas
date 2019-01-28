<?php
/* @var $this PartTypeController */
/* @var $model PartType */

$this->breadcrumbs=array(
	'Part Types'=>array('index'),
	$model->id_part_type=>array('view','id'=>$model->id_part_type),
	'Update',
);

$this->menu=array(
	array('label'=>'List PartType', 'url'=>array('index')),
	array('label'=>'Create PartType', 'url'=>array('create')),
	array('label'=>'View PartType', 'url'=>array('view', 'id'=>$model->id_part_type)),
	array('label'=>'Manage PartType', 'url'=>array('admin')),
);
?>

<h1>Update PartType <?php echo $model->id_part_type; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>