<?php
/* @var $this KendaraanPerusahaanController */
/* @var $model KendaraanPerusahaan */

$this->breadcrumbs=array(
	'Kendaraan Perusahaans'=>array('index'),
	$model->id_kendaraan,
);

$this->menu=array(
	array('label'=>'List KendaraanPerusahaan', 'url'=>array('index')),
	array('label'=>'Create KendaraanPerusahaan', 'url'=>array('create')),
	array('label'=>'Update KendaraanPerusahaan', 'url'=>array('update', 'id'=>$model->id_kendaraan)),
	array('label'=>'Delete KendaraanPerusahaan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_kendaraan),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KendaraanPerusahaan', 'url'=>array('admin')),
);
?>

<h1>View KendaraanPerusahaan #<?php echo $model->id_kendaraan; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_kendaraan',
		'id_jenis_kendaraan',
		'id_petugas',
		'no_polisi',
		'status',
	),
)); ?>
