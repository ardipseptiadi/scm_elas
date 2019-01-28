<?php
/* @var $this KotaController */
/* @var $model Kota */

$this->breadcrumbs=array(
	'Kotas'=>array('index'),
	$model->id_kota=>array('view','id'=>$model->id_kota),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kota', 'url'=>array('index')),
	array('label'=>'Create Kota', 'url'=>array('create')),
	array('label'=>'View Kota', 'url'=>array('view', 'id'=>$model->id_kota)),
	array('label'=>'Manage Kota', 'url'=>array('admin')),
);
?>

<h1>Update Kota <?php echo $model->id_kota; ?></h1>

<?php $this->renderPartial('_form', get_defined_vars()); ?>
