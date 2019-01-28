<?php
/* @var $this PetugasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Produk',
);

$this->menu=array(
	array('label'=>'Tambah Produk', 'url'=>array('create')),
	array('label'=>'Atur Produk', 'url'=>array('admin')),
);
?>

<div class="row">
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Produk</h3>

		<div class="button-groups">
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('admin/produk/create'); ?>">Tambah</a>
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('admin/produk/admin'); ?>">Manage</a>
		</div>

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Data Produk
		</div>
		<div>
			<?php $this->widget('HarapanBaruGrid', array(
				'id'=>'dynamic-table',
				'dataProvider'=>$dataProvider,
				'columns'=>array(
					'nama',
					'harga'
				),
			)); ?>
		</div>
	</div>
</div>
