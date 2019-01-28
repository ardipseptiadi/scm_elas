<?php
/* @var $this PetugasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Petugases',
);

$this->menu=array(
	array('label'=>'Create Petugas', 'url'=>array('create')),
	array('label'=>'Manage Petugas', 'url'=>array('admin')),
);
?>

<div class="row">
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Petugas</h3>
		
		<div class="button-groups">
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('admin/petugas/create'); ?>">Tambah</a>
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('admin/petugas/admin'); ?>">Manage</a>
		</div>
		
		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Data Petugas
		</div>
		<div>
			<?php $this->widget('HarapanBaruGrid', array(
				'id'=>'dynamic-table',
				'dataProvider'=>$dataProvider,
				'columns'=>array(
					'nama',
					'alamat',
					'mulai_bekerja',
					'status',
				),
			)); ?>
		</div>
	</div>
</div>
