<?php
/* @var $this PemesananController */

$this->breadcrumbs=array(
	'Monitoring Pemesanan',
);
?>
<div class="row">
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Pemesanan</h3>

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Monitoring Pemesanan
		</div>
		<div>
			<?php
			$this->widget('HarapanBaruGrid', array(
				'id'=>'dynamic-table',
				'dataProvider'=>$dataProvider,
				'columns'=>array(
					'no_order',
					array(
						'header'=>'Pelanggan',
						'value'=>'$data->idPelanggan->nama'
					),
					'tgl_pesan',
					'tgl_kirim',
					array(
						'header' => 'Status Verifikasi',
						'value' => function($data){
								if($data->is_verifikasi == 0){

									return "<span class='label label-default label-white middle'>Belum Verifikasi</span>";
									}else{
									return "<span class='label label-success label-white middle'>Telah Diverifikasi</span>";
									}
							},
						'type'=>'html'
					)
				),
			));
			?>
		</div>
	</div>
</div>
