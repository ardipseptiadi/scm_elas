<?php
/* @var $this PetugasController */
/* @var $model Petugas */

$this->breadcrumbs=array(
	'Petugases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Petugas', 'url'=>array('index')),
	array('label'=>'Manage Petugas', 'url'=>array('admin')),
);
?>


<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">Tambah Petugas</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					
					<?php $this->renderPartial('_form', get_defined_vars()); ?>
				</div>
			</div>
		</div>
	</div>

	
</div>

<?php Yii::app()->clientScript->registerScript('js_tambah_petugas','
$(".tgl_form").datepicker({
	format:"yyyy-mm-dd",
	autoclose:true,
});
');