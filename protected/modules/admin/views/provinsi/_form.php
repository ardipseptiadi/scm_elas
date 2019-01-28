<?php
/* @var $this ProvinsiController */
/* @var $model Provinsi */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'provinsi-form',
	'htmlOptions' => array('class'=>'form-horizontal'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<!--<p class="note"><span class="required">*</span>Penting untuk diisi.</p>-->

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nama',['class'=>'col-sm-4 control-label']); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'nama',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
		</div>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="form-actions center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class' => 'btn btn-sm btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>