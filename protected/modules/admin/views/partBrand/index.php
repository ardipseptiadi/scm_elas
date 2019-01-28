<?php
/* @var $this PartBrandController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Part Brands',
);

$this->menu=array(
	array('label'=>'Create PartBrand', 'url'=>array('create')),
	array('label'=>'Manage PartBrand', 'url'=>array('admin')),
);
?>

<div class="row">
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Part Brand</h3>
		
		<div class="button-groups">
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('admin/partBrand/create'); ?>">Tambah</a>
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('admin/partBrand/admin'); ?>">Manage</a>
		</div>
		
		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Data Part Brand
		</div>
		<div>
			<?php $this->widget('HarapanBaruGrid', array(
				'id'=>'dynamic-table',
				'dataProvider'=>$dataProvider,
				'columns'=>array(
					'brand_name',
				),
			)); ?>
		</div>
	</div>
</div>
