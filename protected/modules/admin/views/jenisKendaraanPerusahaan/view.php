<?php
/* @var $this JenisKendaraanPerusahaanController */
/* @var $model JenisKendaraanPerusahaan */

$this->breadcrumbs=array(
	'Jenis Kendaraan Perusahaans'=>array('index'),
	$model->id_jenis_kendaraan,
);

$this->menu=array(
	array('label'=>'List JenisKendaraanPerusahaan', 'url'=>array('index')),
	array('label'=>'Create JenisKendaraanPerusahaan', 'url'=>array('create')),
	array('label'=>'Update JenisKendaraanPerusahaan', 'url'=>array('update', 'id'=>$model->id_jenis_kendaraan)),
	array('label'=>'Delete JenisKendaraanPerusahaan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_jenis_kendaraan),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JenisKendaraanPerusahaan', 'url'=>array('admin')),
);
?>

<h1>View JenisKendaraanPerusahaan #<?php echo $model->id_jenis_kendaraan; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_jenis_kendaraan',
		'jenis',
		'kapasitas',
	),
)); ?>
