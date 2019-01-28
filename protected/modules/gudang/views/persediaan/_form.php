<?php
/* @var $this PartController */
/* @var $model Part */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'part-form',
	'htmlOptions'=>array('class'=>'form-horizontal'),
	'action' => Yii::app()->controller->createUrl('tambah',['id'=>$id]),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<!--<p class="note">Fields with <span class="required">*</span> are required.</p>-->

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'id_part',['class'=>'col-sm-3 control-label']); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'id_part',['class'=>'form-control','readonly'=>true]); ?>
		</div>
		<?php echo $form->error($model,'id_part'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'added_qty',['class'=>'col-sm-3 control-label']); ?>
		<div class="col-sm-8">
			<?php echo $form->numberField($model,'added_qty',['class'=>'form-control','min'=>1]); ?>
		</div>
		<?php echo $form->error($model,'added_qty'); ?>
	</div>

	<div class="form-actions center">
		<?php echo CHtml::submitButton('Simpan',array('class' => 'btn btn-sm btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>
