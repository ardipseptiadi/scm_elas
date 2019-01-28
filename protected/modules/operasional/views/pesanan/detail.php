<div class="row">
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Detail Pesanan</h3>
		<div class="button-groups">
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('operasional/pesanan/verifikasi'); ?>">Kembali</a>
		</div>
		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Data Detail Pesanan <?=$id?>
		</div>
		<div>
			<?php
			$this->widget('HarapanBaruGrid', array(
				'id'=>'dynamic-table',
				'dataProvider'=>$dataProvider,
                'columns'=>array(
                    array(
                        'header'=>'Part',
                        'value'=>'$data->idPart->nama_part'
                    ),
                    'qty'
                )
			));
			?>
		</div>
	</div>
</div>
