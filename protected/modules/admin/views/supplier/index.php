<?php
/* @var $this SupplierController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Suppliers',
);

$this->menu=array(
	array('label'=>'Create Supplier', 'url'=>array('create')),
	array('label'=>'Manage Supplier', 'url'=>array('admin')),
);
?>

<div class="row">
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Supplier</h3>

		<div class="button-groups">
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('admin/supplier/create'); ?>">Tambah</a>
			<!-- <a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('admin/supplier/admin'); ?>">Manage</a> -->
		</div>

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Data Supplier
		</div>
		<div>
			<?php $this->widget('HarapanBaruGrid', array(
				'id'=>'dynamic-table',
				'dataProvider'=>$dataProvider,
				'columns'=>array(
					'nama',
					'alamat',
					'no_telpon',
					'kode_bank',
					array(
						'header'=>'Aksi',
						'class' => 'CButtonColumn',
						'template' => '<div class="btn-group">{ubah}{hapus}</div>',
						'htmlOptions' => ['class'=>'col-sm-2'],
						'buttons'=>array(
							'ubah'=>array(
								'label' => 'Ubah',
								'url' => 'Yii::app()->createUrl("admin/supplier/update",array("id"=>$data->id_supplier))',
								'options' => array(
									'class' => 'btn btn-xs btn-default'
								)
							),
              'hapus'=>array(
								'label' => 'Hapus',
								'click' => 'function() {if(!confirm("Anda yakin akan menghapus?")) {return false;}}',
								'url' => 'Yii::app()->createUrl("admin/supplier/delete",array("id"=>$data->id_supplier))',
								'options' => array(
									'class' => 'btn btn-xs btn-info'
								)
							)
						)
					)
				),
			)); ?>
		</div>
	</div>
</div>
