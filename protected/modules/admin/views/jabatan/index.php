<?php
/* @var $this JabatanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Jabatan',
);

$this->menu=array(
	array('label'=>'Create Jabatan', 'url'=>array('create')),
	array('label'=>'Manage Jabatan', 'url'=>array('admin')),
);
?>

<div class="row">
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Jabatan</h3>
		
		<div class="button-groups">
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('admin/jabatan/create'); ?>">Tambah</a>
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('admin/jabatan/admin'); ?>">Manage</a>
		</div>
		
		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Data Jabatan
		</div>
		<div>
			<?php $this->widget('HarapanBaruGrid', array(
				'id'=>'dynamic-table',
				'dataProvider'=>$dataProvider,
				'columns'=>array(
					'id_jabatan',
					'jabatan',
				),
			)); ?>
		</div>
	</div>
</div>
