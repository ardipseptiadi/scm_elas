<?php
/* @var $this PartTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Part Types',
);

$this->menu=array(
	array('label'=>'Create PartType', 'url'=>array('create')),
	array('label'=>'Manage PartType', 'url'=>array('admin')),
);
?>

<div class="row">
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Part Type</h3>
		
		<div class="button-groups">
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('admin/partType/create'); ?>">Tambah</a>
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('admin/partType/admin'); ?>">Manage</a>
		</div>
		
		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Data Part Type
		</div>
		<div>
			<?php $this->widget('HarapanBaruGrid', array(
				'id'=>'dynamic-table',
				'dataProvider'=>$dataProvider,
				'columns'=>array(
					'deskripsi_part',
				),
			)); ?>
		</div>
	</div>
</div>
