<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">Tambah Pemesanan</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					
					<?php $this->renderPartial('_form', get_defined_vars()); ?>
				</div>
			</div>
		</div>
	</div>

	
</div>


<?php Yii::app()->clientScript->registerScript('js_tambah_pesanan','
$(".tgl_form").datepicker({
	orientation:"bottom",
	autoclose:true,
	format:"yyyy-mm-dd"
});
');
Yii::app()->clientScript->registerScript('formPemesananDetail',

file_get_contents(__DIR__.'/pemesanan_cart.js'), CClientScript::POS_END);