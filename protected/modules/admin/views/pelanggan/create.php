<?php
/* @var $this PelangganController */
/* @var $model Pelanggan */

$this->breadcrumbs=array(
	'Pelanggans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pelanggan', 'url'=>array('index')),
	array('label'=>'Manage Pelanggan', 'url'=>array('admin')),
);
?>


<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">Tambah Pelanggan</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					
					<?php $this->renderPartial('_form', get_defined_vars()); ?>
				</div>
			</div>
		</div>
	</div>

	
</div>