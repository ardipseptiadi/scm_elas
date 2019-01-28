<?php
/* @var $this KotaController */
/* @var $model Kota */

$this->breadcrumbs=array(
	'Kotas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Kota', 'url'=>array('index')),
	array('label'=>'Manage Kota', 'url'=>array('admin')),
);
?>

<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">Tambah Kota</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					
					<?php $this->renderPartial('_form', get_defined_vars()); ?>
				</div>
			</div>
		</div>
	</div>

	
</div>