<?php
/* @var $this PetugasController */
/* @var $model Petugas */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'petugas-form',
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
		<?php echo $form->labelEx($model,'nama',['class'=>'col-sm-2 control-label']); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'nama',array('size'=>50,'maxlength'=>50)); ?>
		</div>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'alamat',['class'=>'col-sm-2 control-label']); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'alamat',array('size'=>50,'maxlength'=>50)); ?>
		</div>
		<?php echo $form->error($model,'alamat'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'mulai_bekerja',['class'=>'col-sm-2 control-label']); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'mulai_bekerja',array('class'=>'tgl_form')); ?>
		</div>
		<?php echo $form->error($model,'mulai_bekerja'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'status',['class'=>'col-sm-2 control-label']); ?>
		<div class="col-sm-10">
			<?php echo $form->radioButtonList($model,'status',array('0'=>'Tidak Aktif','1'=>'Aktif')); ?>
		</div>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="form-actions center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class' => 'btn btn-sm btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>