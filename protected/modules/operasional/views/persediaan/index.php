<?php
/* @var $this PersediaanController */

$this->breadcrumbs=array(
	'Persediaan',
);
?>
<div class="row">
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Persediaan</h3>

		<div class="button-groups" style="display:none">
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('gudang/persediaan/create'); ?>">Tambah</a>
			<a class="btn btn-primary" href="<?php //echo Yii::app()->createUrl('admin/jabatan/admin'); ?>">Manage</a>
		</div>

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Data Persediaan
		</div>
		<div>
			<?php
			if(isset($model->date_safety))
			{
				$tgla = explode('-',$model->date_safety);
				$tglds = date('Y-m-d',strtotime('01-'.$tgla[0].'-'.$tgla[1]));
			} ?>
			<h3>Data Persediaan Bulan <?php echo date('F',strtotime($tglds));?></h3>

			<?php $form=$this->beginWidget('CActiveForm', [
			    'id'=>'my-form',
					'method'=>'GET',
					'htmlOptions'=>['class'=>'form-inline'],
			    // 'enableAjaxValidation'=>true,
			    'clientOptions'=>[
			        'validateOnSubmit'=>true
			    ]
			]); ?>
			    <div class="form-group">
			        <?php echo $form->labelEx($model,'date_safety'); ?>
			        <?php echo $form->textField($model,'date_safety',['class'=>'tanggal']); ?>
			        <?php echo $form->error($model,'date_safety'); ?>
			    </div>
			    <?php echo CHtml::submitButton('Cari'); ?>
			<?php $this->endWidget(); ?>
			<?php
			echo CHtml::ajaxSubmitButton('Update Safety Stock',Yii::app()->createUrl('gudang/persediaan/updateAll'),
			                    array(
			                        'type'=>'GET',
			                        // 'data'=> 'js:{"data1": val1, "data2": val2 }',
			                        'success'=>'js:function(string){ alert("Berhasil");location.reload(); }'
			                    ),array('class'=>'someCssClass',));
			?>

			<?php
			$this->widget('HarapanBaruGrid', array(
				'id'=>'dynamic-table',
				'dataProvider'=>$dataProvider,
				'columns'=>array(
					array(
						'header'=>'Nama Part',
						'value'=>'$data->idPart->nama_part'
					),
					array(
						'header'=>'Sisa Stok',
						'name'=>'qty_in_hand',
					),
					array(
						'header' => 'Safety Stock',
						'value' => '$data->safety_stock()'
					),
					array(
						'header' => 'Status',
						'value' => '$data->status()'
					)
				),
			));
			?>
		</div>
	</div>
</div>
<?php
Yii::app()->clientScript->registerScript('part_stock_jquery', '
	$(\'.tanggal\').datepicker({
		format:"mm-yyyy",
		startView:1,
		maxViewMode:2,
		minViewMode:1,
		autclose:true
	})
');
 ?>
