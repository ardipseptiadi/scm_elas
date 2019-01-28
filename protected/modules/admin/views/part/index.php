<?php
/* @var $this PartController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Parts',
);

$this->menu=array(
	array('label'=>'Create Part', 'url'=>array('create')),
	array('label'=>'Manage Part', 'url'=>array('admin')),
);
?>

<div class="row">
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Part</h3>

		<div class="button-groups">
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('admin/part/create'); ?>">Tambah</a>
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('admin/part/admin'); ?>">Manage</a>
		</div>

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Data Part
		</div>
		<div>
			<?php $this->widget('HarapanBaruGrid', array(
				'id'=>'dynamic-table',
				'dataProvider'=>$dataProvider,
				'columns'=>array(
					'part_code',
					['header'=>'Stok Awal','name'=>'partStock.init_stock'],
					// array(
					// 	'name'=>'Parent Part'
					// ),
					// array(
					// 	'name'=>'Part Brand'
					// ),
					// array(
					// 	'name'=>'Part Level'
					// ),
					// array(
					// 	'name'=>'Part Type'
					// ),
					'nama_part',
					'berat',
					'keterangan',
					'satuan',
					'hpp',
					'harga',
				),
			)); ?>
		</div>
	</div>
</div>
