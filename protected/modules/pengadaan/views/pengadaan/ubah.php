<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">Ubah Pengadaan</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">

					<?php $this->renderPartial('_form', get_defined_vars()); ?>
				</div>
			</div>
		</div>
	</div>
</div>


<?php Yii::app()->clientScript->registerScript('js_ubah_pengadaan','
$(".tgl_form").datepicker({
	orientation:"bottom",
	autoclose:true,
	format:"yyyy-mm-dd"
});
');
Yii::app()->clientScript->registerScript('formUbahPengadaanDetail',

file_get_contents(__DIR__.'/pengadaan_cart.js'), CClientScript::POS_END);
Yii::app()->clientScript->registerScript('formPengadaanPeramalanUbah',

file_get_contents(__DIR__.'/pengadaan_peramalan.js'), CClientScript::POS_END);
