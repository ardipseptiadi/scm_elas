<?php
/* @var $this KendaraanPerusahaanController */
/* @var $model KendaraanPerusahaan */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_kendaraan'); ?>
		<?php echo $form->textField($model,'id_kendaraan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_jenis_kendaraan'); ?>
		<?php echo $form->textField($model,'id_jenis_kendaraan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_petugas'); ?>
		<?php echo $form->textField($model,'id_petugas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_polisi'); ?>
		<?php echo $form->textField($model,'no_polisi',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->