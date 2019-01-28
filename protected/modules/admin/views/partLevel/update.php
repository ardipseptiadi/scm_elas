<?php
/* @var $this PartLevelController */
/* @var $model PartLevel */

$this->breadcrumbs=array(
	'Part Levels'=>array('index'),
	$model->id_part_level=>array('view','id'=>$model->id_part_level),
	'Update',
);

$this->menu=array(
	array('label'=>'List PartLevel', 'url'=>array('index')),
	array('label'=>'Create PartLevel', 'url'=>array('create')),
	array('label'=>'View PartLevel', 'url'=>array('view', 'id'=>$model->id_part_level)),
	array('label'=>'Manage PartLevel', 'url'=>array('admin')),
);
?>

<h1>Update PartLevel <?php echo $model->id_part_level; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>