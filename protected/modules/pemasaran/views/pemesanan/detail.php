<div class="row">
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Detail Pesanan</h3>
		<div class="button-groups">
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('pemasaran/pemesanan/index'); ?>">Kembali</a>
		</div>
		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Data Detail Pesanan <?=$id?>
		</div>
		<div>
			<?php
			$total = 0;
			foreach ($dataProvider->getData() as $m) {
				$total += $m->idProduk->harga *$m->qty;
			}
			$this->widget('HarapanBaruGrid', array(
				'id'=>'dynamic-table',
				'dataProvider'=>$dataProvider,
                'columns'=>array(
                    array(
                        'header'=>'Part',
                        'value'=>'$data->idProduk->nama'
                    ),
                    'qty',
										array(
											'header' => 'Harga',
											'value' => '$data->idProduk->harga',
											'footer'=>'Total'
										),
										array(
											'header' => 'Subtotal',
											'value'=> '$data->idProduk->harga * $data->qty',
											'footer'=>"Rp. ".number_format($total,0,".",".")
										)
                )
			));
			?>
		</div>
	</div>
</div>
