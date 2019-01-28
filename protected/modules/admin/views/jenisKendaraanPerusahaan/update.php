<?php
/* @var $this JenisKendaraanPerusahaanController */
/* @var $model JenisKendaraanPerusahaan */

$this->breadcrumbs=array(
	'Jenis Kendaraan Perusahaans'=>array('index'),
	$model->id_jenis_kendaraan=>array('view','id'=>$model->id_jenis_kendaraan),
	'Update',
);

$this->menu=array(
	array('label'=>'List JenisKendaraanPerusahaan', 'url'=>array('index')),
	array('label'=>'Create JenisKendaraanPerusahaan', 'url'=>array('create')),
	array('label'=>'View JenisKendaraanPerusahaan', 'url'=>array('view', 'id'=>$model->id_jenis_kendaraan)),
	array('label'=>'Manage JenisKendaraanPerusahaan', 'url'=>array('admin')),
);
?>

<h1>Update JenisKendaraanPerusahaan <?php echo $model->id_jenis_kendaraan; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>