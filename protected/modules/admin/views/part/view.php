<?php
/* @var $this PartController */
/* @var $model Part */

$this->breadcrumbs=array(
	'Parts'=>array('index'),
	$model->id_part,
);

$this->menu=array(
	array('label'=>'List Part', 'url'=>array('index')),
	array('label'=>'Create Part', 'url'=>array('create')),
	array('label'=>'Update Part', 'url'=>array('update', 'id'=>$model->id_part)),
	array('label'=>'Delete Part', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_part),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Part', 'url'=>array('admin')),
);
?>

<h1>View Part #<?php echo $model->id_part; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_part',
		'id_parent',
		'id_brand',
		'id_part_level',
		'id_part_type',
		'part_code',
		'nama_part',
		'berat',
		'keterangan',
		'satuan',
		'hpp',
		'harga',
	),
)); ?>
