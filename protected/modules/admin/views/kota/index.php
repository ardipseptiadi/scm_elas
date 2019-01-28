<?php
/* @var $this KotaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kotas',
);

$this->menu=array(
	array('label'=>'Create Kota', 'url'=>array('create')),
	array('label'=>'Manage Kota', 'url'=>array('admin')),
);
?>

<div class="row">
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Kota</h3>
		
		<div class="button-groups">
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('admin/kota/create'); ?>">Tambah</a>
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('admin/kota/admin'); ?>">Manage</a>
		</div>
		
		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Data Kota
		</div>
		<div>
			<?php $this->widget('HarapanBaruGrid', array(
				'id'=>'dynamic-table',
				'dataProvider'=>$dataProvider,
				'columns'=>array(
					array(
						'name'=>'Provinsi',
						'value'=>'$data->idProvinsi->nama'
					),
					'nama'
				),
			)); ?>
		</div>
	</div>
</div>
