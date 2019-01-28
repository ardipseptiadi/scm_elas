<?php
/* @var $this PetugasController */
/* @var $model Petugas */

$this->breadcrumbs=array(
	'Petugases'=>array('index'),
	$model->id_petugas,
);

$this->menu=array(
	array('label'=>'List Petugas', 'url'=>array('index')),
	array('label'=>'Create Petugas', 'url'=>array('create')),
	array('label'=>'Update Petugas', 'url'=>array('update', 'id'=>$model->id_petugas)),
	array('label'=>'Delete Petugas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_petugas),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Petugas', 'url'=>array('admin')),
);
?>

<h1>View Petugas #<?php echo $model->id_petugas; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_petugas',
		'nama',
		'alamat',
		'mulai_bekerja',
		'status',
	),
)); ?>
