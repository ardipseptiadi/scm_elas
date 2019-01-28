<?php
/* @var $this KotaController */
/* @var $model Kota */

$this->breadcrumbs=array(
	'Kotas'=>array('index'),
	$model->id_kota,
);

$this->menu=array(
	array('label'=>'List Kota', 'url'=>array('index')),
	array('label'=>'Create Kota', 'url'=>array('create')),
	array('label'=>'Update Kota', 'url'=>array('update', 'id'=>$model->id_kota)),
	array('label'=>'Delete Kota', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_kota),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kota', 'url'=>array('admin')),
);
?>

<h1>View Kota #<?php echo $model->id_kota; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_kota',
		'id_provinsi',
		'nama',
	),
)); ?>
