<?php
/* @var $this ProvinsiController */
/* @var $model Provinsi */

$this->breadcrumbs=array(
	'Provinsis'=>array('index'),
	$model->id_provinsi,
);

$this->menu=array(
	array('label'=>'List Provinsi', 'url'=>array('index')),
	array('label'=>'Create Provinsi', 'url'=>array('create')),
	array('label'=>'Update Provinsi', 'url'=>array('update', 'id'=>$model->id_provinsi)),
	array('label'=>'Delete Provinsi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_provinsi),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Provinsi', 'url'=>array('admin')),
);
?>

<h1>View Provinsi #<?php echo $model->id_provinsi; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_provinsi',
		'nama',
	),
)); ?>
