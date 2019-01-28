<?php
/* @var $this PeramalanController */

$this->breadcrumbs=array(
	'Pengadaan',
);
?>
<div class="row">
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Verifikasi Pengadaan</h3>


		<div class="clearfix">
			<div class="pull-right tableTools-container">
				<?php $form = $this->beginWidget('CActiveForm', array(
	                    'id'          => 'form-filter-pengadaan',
	                    'action'      => Yii::app()->createUrl($this->route),
	                    'method'      => 'post',
	                    'htmlOptions' => array('class' => 'form-inline'),
	                ));?>
					<div class="form-group">
					</div>
					<div class="form-group">
						<?php echo CHtml::htmlButton('<i class="fa fa-search"></i> Cari',
                                    array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
					</div>
					<?php $this->endWidget();?>
			</div>
		</div>
		<div class="table-header">
			Data Pengadaan
		</div>
		<div>
			<?php
			$this->widget('HarapanBaruGrid', array(
				'id'=>'verif_grid_pengadaan',
				'dataProvider'=>$dataProvider,
				'columns'=>array(
					'no_pengadaan',
					'tgl_pengadaan',
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
						'template' => '<div class="btn-group">{detail}{verifikasi}</div>',
						'htmlOptions' => ['class'=>'col-sm-2'],
						'buttons'=>array(
							'detail'=>array(
								'label' => 'Detail',
								'url' => 'Yii::app()->createUrl("operasional/pengadaan/detail",array("id"=>$data->id_pengadaan))',
								'options' => array(
									'class' => 'btn btn-xs btn-default'
								)
							),
              'verifikasi'=>array(
								'label' => 'Verifikasi',
                'visible' => '$data->is_verifikasi<1',
								'url' => 'Yii::app()->createUrl("operasional/pengadaan/act",array("id"=>$data->id_pengadaan))',
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
Yii::app()->clientScript->registerScript('list-pengadaan', '
$(\'.tanggal\').datepicker({
		format: "mm-yyyy",
		viewMode: "months",
		minViewMode: "months"
}).on(\'changeDate\', function (ev) {
		 $(\'.datepicker\').hide();
});

jQuery(\'#verif_grid_pengadaan a.verif\').live(\'click\',function() {
        if(!confirm(\'Anda yakin akan Diverifikasi?\')) return false;

        var url = $(this).attr(\'href\');
        //  do your post request here
        $.post(url,function(res){
             alert(res);
						 location.reload();
         });
        return false;
});

', CClientScript::POS_END);
