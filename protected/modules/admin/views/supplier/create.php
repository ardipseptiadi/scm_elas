<?php
/* @var $this SupplierController */
/* @var $model Supplier */

$this->breadcrumbs=array(
	'Suppliers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Supplier', 'url'=>array('index')),
	array('label'=>'Manage Supplier', 'url'=>array('admin')),
);
?>

<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">Tambah Supplier</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					
					<?php $this->renderPartial('_form', get_defined_vars()); ?>
				</div>
			</div>
		</div>
	</div>

	
</div>