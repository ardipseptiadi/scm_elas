<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">Tambah Pengadaan</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">

					<?php $this->renderPartial('_form', get_defined_vars()); ?>
				</div>
			</div>
		</div>
	</div>
</div>


<?php Yii::app()->clientScript->registerScript('js_tambah_pengadaan','
$(".tgl_form").datepicker({
	orientation:"bottom",
	autoclose:true,
	format:"yyyy-mm-dd"
});
');
Yii::app()->clientScript->registerScript('formPengadaanDetail',

file_get_contents(__DIR__.'/pengadaan_cart.js'), CClientScript::POS_END);
Yii::app()->clientScript->registerScript('formPengadaanPeramalan',

file_get_contents(__DIR__.'/pengadaan_peramalan.js'), CClientScript::POS_END);
