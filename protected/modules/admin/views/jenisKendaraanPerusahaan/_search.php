<?php
/* @var $this JenisKendaraanPerusahaanController */
/* @var $model JenisKendaraanPerusahaan */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_jenis_kendaraan'); ?>
		<?php echo $form->textField($model,'id_jenis_kendaraan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jenis'); ?>
		<?php echo $form->textField($model,'jenis',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kapasitas'); ?>
		<?php echo $form->textField($model,'kapasitas'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->