<?php
/* @var $this PartController */
/* @var $model Part */

$this->breadcrumbs=array(
	'Parts'=>array('index'),
	$model->id_part=>array('view','id'=>$model->id_part),
	'Update',
);

$this->menu=array(
	array('label'=>'List Part', 'url'=>array('index')),
	array('label'=>'Create Part', 'url'=>array('create')),
	array('label'=>'View Part', 'url'=>array('view', 'id'=>$model->id_part)),
	array('label'=>'Manage Part', 'url'=>array('admin')),
);
?>

<h1>Update Part <?php echo $model->id_part; ?></h1>

<?php $this->renderPartial('_form', get_defined_vars()); ?>
