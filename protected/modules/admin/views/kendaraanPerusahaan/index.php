<?php
/* @var $this KendaraanPerusahaanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kendaraan Perusahaans',
);

$this->menu=array(
	array('label'=>'Create KendaraanPerusahaan', 'url'=>array('create')),
	array('label'=>'Manage KendaraanPerusahaan', 'url'=>array('admin')),
);
?>

<div class="row">
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Kendaraan Perusahaan</h3>
		
		<div class="button-groups">
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('admin/kendaraanPerusahaan/create'); ?>">Tambah</a>
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('admin/kendaraanPerusahaan/admin'); ?>">Manage</a>
		</div>
		
		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Data Kendaraan Perusahaan
		</div>
		<div>
			<?php $this->widget('HarapanBaruGrid', array(
				'id'=>'dynamic-table',
				'dataProvider'=>$dataProvider,
				'columns'=>array(
					'no_polisi',
					array(
						'name'=>'Jenis Kendaraan',
						'value'=>'$data->idJenisKendaraan->jenis'
					),
					array(
						'name'=>'Petugas',
						'value'=>'$data->idPetugas->nama'
					),
					array(
						'name'=>'Status',
						'value'=>'$data->status == "1"?"Aktif":"Tidak Aktif"'
					),
				),
			)); ?>
		</div>
	</div>
</div>
