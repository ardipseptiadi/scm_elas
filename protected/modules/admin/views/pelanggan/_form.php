<?php
/* @var $this PelangganController */
/* @var $model Pelanggan */
/* @var $form CActiveForm */
?>
<style>
#map_canvas {
    width: 500px;
    height: 400px;
}
#current {
    padding-top: 25px;
}
</style>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pelanggan-form',
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
		<?php echo $form->labelEx($model,'id_kota',['class'=>'col-sm-2 control-label']); ?>
		<div class="col-sm-10">
			<?php echo $form->dropDownList($model,'id_kota',$list_kota,array('empty'=>'--Pilih Kota--')); ?>
		</div>
		<?php echo $form->error($model,'id_kota'); ?>
	</div>

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
		<?php echo $form->labelEx($model,'no_telepon',['class'=>'col-sm-2 control-label']); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'no_telepon',array('size'=>15,'maxlength'=>15)); ?>
		</div>
		<?php echo $form->error($model,'no_telepon'); ?>
	</div>
	<!-- <iframe
  width="600"
  height="450"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyAXIhwmOj0_F84TgWQrdpJQVdEjLwWEPC0&origin=Oslo+Norway&destination=Telemark+Norway&avoid=tolls|highways" allowfullscreen>
</iframe> -->



	<div class="form-actions center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class' => 'btn btn-sm btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>
