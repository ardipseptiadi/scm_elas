<?php
/* @var $this JenisKendaraanPerusahaanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Jenis Kendaraan Perusahaan',
);

$this->menu=array(
	array('label'=>'Create JenisKendaraanPerusahaan', 'url'=>array('create')),
	array('label'=>'Manage JenisKendaraanPerusahaan', 'url'=>array('admin')),
);
?>

<div class="row">
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Jenis Kendaraan Perusahaan</h3>
		
		<div class="button-groups">
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('admin/jenisKendaraanPerusahaan/create'); ?>">Tambah</a>
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('admin/jenisKendaraanPerusahaan/admin'); ?>">Manage</a>
		</div>
		
		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Data Jenis Kendaraan Perusahaan
		</div>
		<div>
			<?php $this->widget('HarapanBaruGrid', array(
				'id'=>'dynamic-table',
				'dataProvider'=>$dataProvider,
				'columns'=>array(
					'id_jenis_kendaraan',
					'jenis',
					'kapasitas'
				),
			)); ?>
		</div>
	</div>
</div>
