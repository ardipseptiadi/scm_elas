<?php
/* @var $this KendaraanPerusahaanController */
/* @var $model KendaraanPerusahaan */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kendaraan-perusahaan-form',
	'htmlOptions'=>array('class'=>'form-horizontal'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<!--<p class="note">Fields with <span class="required">*</span> are required.</p>-->

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'id_jenis_kendaraan',['class'=>'col-sm-4 control-label']); ?>
		<div class="col-sm-8">
			<?php echo $form->dropDownList($model,'id_jenis_kendaraan',$list_jenis_kendaraan,array('empty'=>'--Pilih Jenis--')); ?>
		</div>
		<?php echo $form->error($model,'id_jenis_kendaraan'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'id_petugas',['class'=>'col-sm-4 control-label']); ?>
		<div class="col-sm-8">
			<?php echo $form->dropDownList($model,'id_petugas',$list_petugas,array('empty'=>'--Pilih Petugas--')); ?>
		</div>
		<?php echo $form->error($model,'id_petugas'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'no_polisi',['class'=>'col-sm-4 control-label']); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'no_polisi',array('size'=>11,'maxlength'=>11)); ?>
		</div>
		<?php echo $form->error($model,'no_polisi'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'status',['class'=>'col-sm-4 control-label']); ?>
		<div class="col-sm-8">
			<?php echo $form->dropDownList($model,'status',array('0'=>'Tidak Tersedia','1'=>'Tersedia'),array('empty'=>'--Pilih Status--')); ?>
		</div>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="form-actions center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class' => 'btn btn-sm btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>