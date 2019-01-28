<?php
/* @var $this ProvinsiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Provinsis',
);

$this->menu=array(
	array('label'=>'Create Provinsi', 'url'=>array('create')),
	array('label'=>'Manage Provinsi', 'url'=>array('admin')),
);
?>

<div class="row">
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Provinsi</h3>
		
		<div class="button-groups">
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('admin/provinsi/create'); ?>">Tambah</a>
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('admin/provinsi/admin'); ?>">Manage</a>
		</div>
		
		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Data Provinsi
		</div>
		<div>
			<?php $this->widget('HarapanBaruGrid', array(
				'id'=>'dynamic-table',
				'dataProvider'=>$dataProvider,
				'columns'=>array(
					'id_provinsi',
					'nama',
				),
			)); ?>
		</div>
	</div>
</div>
