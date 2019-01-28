<?php
/* @var $this PemesananController */

$this->breadcrumbs=array(
	'Pemesanan',
);
?>
<div class="row">
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Pesanan</h3>

		<div class="button-groups">
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('pemasaran/pemesanan/create'); ?>">Tambah</a>
			<a class="btn btn-primary" style="display:none" href="<?php //echo Yii::app()->createUrl('admin/jabatan/admin'); ?>">Manage</a>
		</div>

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Data Pesanan
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
					),
					array(
						'header'=>'Aksi',
						'class' => 'CButtonColumn',
						'template' => '<div class="btn-group">{detail}{ubah}{hapus}</div>',
						'htmlOptions' => ['class'=>'col-sm-2'],
						'buttons'=>array(
							'detail'=>array(
								'label' => 'Detail',
								'url' => 'Yii::app()->createUrl("pemasaran/pemesanan/detail",array("id"=>$data->id_pesanan))',
								'options' => array(
									'class' => 'btn btn-xs btn-default'
								)
							),
							'ubah'=>array(
								'label' => 'Ubah',
								'visible' => '$data->is_verifikasi == "0"',
								'url' => 'Yii::app()->createUrl("pemasaran/pemesanan/ubah",array("id"=>$data->id_pesanan))',
								'options' => array(
									'class' => 'btn btn-xs btn-info'
								)
							),
							'hapus'=>array(
								'label' => 'Hapus',
								'visible' => '$data->is_verifikasi == "0"',
								'url' => 'Yii::app()->createUrl("pemasaran/pemesanan/hapus",array("id"=>$data->id_pesanan))',
								'options' => array(
									'class' => 'btn btn-xs btn-danger',
									'onclick'=>"return confirm('Apa anda yakin ingin menghapus item ini?');"
								)
							)
						)
					)
				),
			));
			?>
		</div>
	</div>
</div>
