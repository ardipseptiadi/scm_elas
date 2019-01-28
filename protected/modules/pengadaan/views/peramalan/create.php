<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">Tambah Peramalan</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">

					<?php $this->renderPartial('_form', get_defined_vars()); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php Yii::app()->clientScript->registerScript('js_tambah_peramalan','
$(".bln_form").datepicker({
	orientation:"bottom",
	autoclose:true,
  format: "mm-yyyy",
  startView: "months", 
  minViewMode: "months"
});
');
