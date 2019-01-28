<?php
/* @var $this ProdukController */
/* @var $model Produk */

$this->breadcrumbs=array(
	'Produk'=>array('index'),
	$model->id_produk=>array('view','id'=>$model->id_produk),
	'Update',
);

$this->menu=array(
	array('label'=>'List Produk', 'url'=>array('index')),
	array('label'=>'Create Produk', 'url'=>array('create')),
	array('label'=>'View Produk', 'url'=>array('view', 'id'=>$model->id_produk)),
	array('label'=>'Manage Produk', 'url'=>array('admin')),
);
?>

<h1>Update Produk ID: <?php echo $model->id_produk; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
