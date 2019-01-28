<?php
/* @var $this KotaController */
/* @var $model Kota */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kota-form',
	'htmlOptions' => array('class'=>'form-horizontal'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<!--<p class="note">Fields with <span class="required">*</span> are required.</p>-->

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'id_provinsi',['class'=>'col-sm-3 control-label']); ?>
		<div class="col-sm-9">
			<?php echo $form->dropDownList($model,'id_provinsi',$list_provinsi,array('empty'=>'--Pilih Provinsi--')); ?>
		</div>
		<?php echo $form->error($model,'id_provinsi'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nama',['class'=>'col-sm-3 control-label']); ?>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'nama',array('size'=>50,'maxlength'=>50)); ?>
		</div>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="form-actions center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class' => 'btn btn-sm btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>
