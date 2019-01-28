<?php
/* @var $this ProvinsiController */
/* @var $model Provinsi */

$this->breadcrumbs=array(
	'Provinsis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Provinsi', 'url'=>array('index')),
	array('label'=>'Manage Provinsi', 'url'=>array('admin')),
);
?>

<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">Tambah Data Provinsi</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					
					<?php $this->renderPartial('_form', array('model'=>$model)); ?>
				</div>
			</div>
		</div>
	</div>

	
</div>