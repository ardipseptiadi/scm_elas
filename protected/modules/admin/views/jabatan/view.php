<?php
/* @var $this JabatanController */
/* @var $model Jabatan */

$this->breadcrumbs=array(
	'Jabatans'=>array('index'),
	$model->id_jabatan,
);

$this->menu=array(
	array('label'=>'List Jabatan', 'url'=>array('index')),
	array('label'=>'Create Jabatan', 'url'=>array('create')),
	array('label'=>'Update Jabatan', 'url'=>array('update', 'id'=>$model->id_jabatan)),
	array('label'=>'Delete Jabatan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_jabatan),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Jabatan', 'url'=>array('admin')),
);
?>

<h1>View Jabatan #<?php echo $model->id_jabatan; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_jabatan',
		'jabatan',
	),
)); ?>
