<?php
/* @var $this KendaraanPerusahaanController */
/* @var $model KendaraanPerusahaan */

$this->breadcrumbs=array(
	'Kendaraan Perusahaans'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List KendaraanPerusahaan', 'url'=>array('index')),
	array('label'=>'Create KendaraanPerusahaan', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#kendaraan-perusahaan-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Kendaraan Perusahaan</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kendaraan-perusahaan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'no_polisi',
		array(
			'header'=>'Jenis Kendaraan',
			'value'=>'$data->idJenisKendaraan->jenis'
		),
		array(
			'header'=>'Petugas',
			'value'=>'$data->idPetugas->nama'
		),
		array(
			'header'=>'Status',
			'value'=>'$data->status == "1"?"Aktif":"Tidak Aktif"'
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
