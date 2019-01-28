<?php
/* @var $this PartBrandController */
/* @var $model PartBrand */

$this->breadcrumbs=array(
	'Part Brands'=>array('index'),
	$model->id_part_brand=>array('view','id'=>$model->id_part_brand),
	'Update',
);

$this->menu=array(
	array('label'=>'List PartBrand', 'url'=>array('index')),
	array('label'=>'Create PartBrand', 'url'=>array('create')),
	array('label'=>'View PartBrand', 'url'=>array('view', 'id'=>$model->id_part_brand)),
	array('label'=>'Manage PartBrand', 'url'=>array('admin')),
);
?>

<h1>Update PartBrand <?php echo $model->id_part_brand; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>