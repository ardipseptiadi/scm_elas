<?php
/* @var $this PeramalanController */

$this->breadcrumbs=array(
	'Pengadaan',
);
?>
<div class="row">
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Pengadaan</h3>

		<div class="button-groups">
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('pengadaan/pengadaan/tambah'); ?>">Tambah</a>
			<a class="btn btn-primary" style="display:none" href="<?php //echo Yii::app()->createUrl('admin/jabatan/admin'); ?>">Manage</a>
		</div>

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
				'id'=>'dynamic-table',
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
						'template' => '<div class="btn-group">{detail}{ubah}{hapus}</div>',
						'htmlOptions' => ['class'=>'col-sm-2'],
						'buttons'=>array(
							'detail'=>array(
								'label' => 'Detail',
								'url' => 'Yii::app()->createUrl("pengadaan/pengadaan/detail",array("id"=>$data->id_pengadaan))',
								'options' => array(
									'class' => 'btn btn-xs btn-default'
								)
							),
							'ubah'=>array(
								'label' => 'Ubah',
								'visible' => '$data->is_verifikasi == "0"',
								'url' => 'Yii::app()->createUrl("pengadaan/pengadaan/ubah",array("id"=>$data->id_pengadaan))',
								'options' => array(
									'class' => 'btn btn-xs btn-info'
								)
							),
							'hapus'=>array(
								'label' => 'Hapus',
								'visible' => '$data->is_verifikasi == "0"',
								'url' => 'Yii::app()->createUrl("pengadaan/pengadaan/hapus",array("id"=>$data->id_pengadaan))',
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
<?php
Yii::app()->clientScript->registerScript('list-pengadaan', '
$(\'.tanggal\').datepicker({
		format: "mm-yyyy",
		viewMode: "months",
		minViewMode: "months"
}).on(\'changeDate\', function (ev) {
		 $(\'.datepicker\').hide();
});

', CClientScript::POS_END);
