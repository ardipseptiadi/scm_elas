<?php
/* @var $this PartController */
/* @var $model Part */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'part-form',
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
		<?php echo $form->labelEx($model,'id_brand',['class'=>'col-sm-3 control-label']); ?>
		<div class="col-sm-8">
			<?php echo $form->dropDownList($model,'id_brand',$list_brand,array('empty'=>'--brand--')); ?>
		</div>
		<?php echo $form->error($model,'id_brand'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'part_code',['class'=>'col-sm-3 control-label']); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'part_code',array('size'=>15,'maxlength'=>15)); ?>
		</div>
		<?php echo $form->error($model,'part_code'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nama_part',['class'=>'col-sm-3 control-label']); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'nama_part',array('size'=>50,'maxlength'=>50)); ?>
		</div>
		<?php echo $form->error($model,'nama_part'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'berat',['class'=>'col-sm-3 control-label']); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'berat'); ?>
		</div>
		<?php echo $form->error($model,'berat'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'keterangan',['class'=>'col-sm-3 control-label']); ?>
		<div class="col-sm-8">
			<?php echo $form->textArea($model,'keterangan',array('rows'=>6, 'cols'=>50)); ?>
		</div>
		<?php echo $form->error($model,'keterangan'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'satuan',['class'=>'col-sm-3 control-label']); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'satuan',array('size'=>10,'maxlength'=>10)); ?>
		</div>
		<?php echo $form->error($model,'satuan'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'hpp',['class'=>'col-sm-3 control-label']); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'hpp'); ?>
		</div>
		<?php echo $form->error($model,'hpp'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'harga',['class'=>'col-sm-3 control-label']); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'harga'); ?>
		</div>>
		<?php echo $form->error($model,'harga'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::label('Stok Awal','stok_awal',['class'=>'col-sm-3 control-label']); ?>
		<div class="col-sm-8">
			<?php echo CHtml::numberField('stok_awal','',['placeholder'=>'0','required'=>true,'min'=>0]); ?>
		</div>
	</div>

	<div class="form-actions center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class' => 'btn btn-sm btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>
