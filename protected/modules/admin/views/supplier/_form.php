<?php
/* @var $this SupplierController */
/* @var $model Supplier */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'supplier-form',
	'htmlOptions'=>array('class'=>'form-horizontal'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<!--<p class="note">Fields with <span class="required">*</span> are requireds.</p>-->

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
		<?php echo $form->labelEx($model,'no_telpon',['class'=>'col-sm-2 control-label']); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'no_telpon',array('size'=>15,'maxlength'=>15)); ?>
		</div>
		<?php echo $form->error($model,'no_telpon'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'kode_bank',['class'=>'col-sm-2 control-label']); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'kode_bank',array('size'=>5,'maxlength'=>5)); ?>
		</div>
		<?php echo $form->error($model,'kode_bank'); ?>
	</div>

	<div class="form-actions center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class' => 'btn btn-sm btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>
