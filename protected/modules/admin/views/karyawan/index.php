<?php
/* @var $this KaryawanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Karyawans',
);

$this->menu=array(
	array('label'=>'Create Karyawan', 'url'=>array('create')),
	array('label'=>'Manage Karyawan', 'url'=>array('admin')),
);
?>

<div class="row">
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Karyawan</h3>
		
		<div class="button-groups">
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('admin/karyawan/create'); ?>">Tambah</a>
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('admin/karyawan/admin'); ?>">Manage</a>
		</div>
		
		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Data Karyawan
		</div>
		<div>
			<?php $this->widget('HarapanBaruGrid', array(
				'id'=>'dynamic-table',
				'dataProvider'=>$dataProvider,
				'columns'=>array(
					'nip',
					array(
						'name'=>'Jabatan',
						'value'=>'$data->idJabatan->jabatan',
					),
					'nama',
					'alamat',
					array(
						'name'=>'Status',
						'value'=>'$data->status == 1 ? "Aktif":"Tidak Aktif"',
					),
				),
			)); ?>
		</div>
	</div>
</div>
