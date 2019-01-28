<?php
/* @var $this KendaraanPerusahaanController */
/* @var $model KendaraanPerusahaan */

$this->breadcrumbs=array(
	'Kendaraan Perusahaans'=>array('index'),
	$model->id_kendaraan=>array('view','id'=>$model->id_kendaraan),
	'Update',
);

$this->menu=array(
	array('label'=>'List KendaraanPerusahaan', 'url'=>array('index')),
	array('label'=>'Create KendaraanPerusahaan', 'url'=>array('create')),
	array('label'=>'View KendaraanPerusahaan', 'url'=>array('view', 'id'=>$model->id_kendaraan)),
	array('label'=>'Manage KendaraanPerusahaan', 'url'=>array('admin')),
);
?>

<h1>Update KendaraanPerusahaan <?php echo $model->id_kendaraan; ?></h1>

<?php $this->renderPartial('_form', get_defined_vars()); ?>
