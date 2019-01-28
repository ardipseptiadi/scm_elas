<?php
/* @var $this PemesananController */

$this->breadcrumbs=array(
	'Pemesanan',
);
?>
<div class="row">
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Verifikasi Pesanan</h3>

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Data Pesanan
		</div>
		<div>
			<?php
			$this->widget('HarapanBaruGrid', array(
				'id'=>'verif_grid',
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
						'template' => '<div class="btn-group">{detail}{ubah}</div>',
						'htmlOptions' => ['class'=>'col-sm-2'],
						'buttons'=>array(
							'detail'=>array(
								'label' => 'Detail',
								'url' => 'Yii::app()->createUrl("operasional/pesanan/detail",array("id"=>$data->id_pesanan))',
								'options' => array(
									'class' => 'btn btn-xs btn-default'
								)
							),
							'ubah'=>array(
								'label' => 'Verifikasi',
                'visible' => '$data->is_verifikasi<1',
								'url' => 'Yii::app()->createUrl("operasional/pesanan/act",array("id"=>$data->id_pesanan))',
								'options' => array(
									'class' => 'btn btn-xs btn-info verif'
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
<?php
Yii::app()->clientScript->registerScript('verified', "
jQuery('#verif_grid a.verif').live('click',function() {
        if(!confirm('Anda yakin akan Diverifikasi?')) return false;

        var url = $(this).attr('href');
        //  do your post request here
        $.post(url,function(res){
             alert(res);
						 location.reload();
         });
        return false;
});

");
