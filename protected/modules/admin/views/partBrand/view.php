<?php
/* @var $this PartBrandController */
/* @var $model PartBrand */

$this->breadcrumbs=array(
	'Part Brands'=>array('index'),
	$model->id_part_brand,
);

$this->menu=array(
	array('label'=>'List PartBrand', 'url'=>array('index')),
	array('label'=>'Create PartBrand', 'url'=>array('create')),
	array('label'=>'Update PartBrand', 'url'=>array('update', 'id'=>$model->id_part_brand)),
	array('label'=>'Delete PartBrand', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_part_brand),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PartBrand', 'url'=>array('admin')),
);
?>

<h1>View PartBrand #<?php echo $model->id_part_brand; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_part_brand',
		'brand_name',
	),
)); ?>
