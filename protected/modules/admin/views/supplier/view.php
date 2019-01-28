<?php
/* @var $this SupplierController */
/* @var $model Supplier */

$this->breadcrumbs=array(
	'Suppliers'=>array('index'),
	$model->id_supplier,
);

$this->menu=array(
	array('label'=>'List Supplier', 'url'=>array('index')),
	array('label'=>'Create Supplier', 'url'=>array('create')),
	array('label'=>'Update Supplier', 'url'=>array('update', 'id'=>$model->id_supplier)),
	array('label'=>'Delete Supplier', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_supplier),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Supplier', 'url'=>array('admin')),
);
?>

<h1>View Supplier #<?php echo $model->id_supplier; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_supplier',
		'nama',
		'alamat',
		'no_telpon',
		'kode_bank'
	),
)); ?>
