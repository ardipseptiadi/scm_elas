<?php
/* @var $this PartController */
/* @var $model Part */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_part'); ?>
		<?php echo $form->textField($model,'id_part'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_parent'); ?>
		<?php echo $form->textField($model,'id_parent'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_brand'); ?>
		<?php echo $form->textField($model,'id_brand'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_part_level'); ?>
		<?php echo $form->textField($model,'id_part_level'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_part_type'); ?>
		<?php echo $form->textField($model,'id_part_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'part_code'); ?>
		<?php echo $form->textField($model,'part_code',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_part'); ?>
		<?php echo $form->textField($model,'nama_part',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'berat'); ?>
		<?php echo $form->textField($model,'berat'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keterangan'); ?>
		<?php echo $form->textArea($model,'keterangan',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'satuan'); ?>
		<?php echo $form->textField($model,'satuan',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hpp'); ?>
		<?php echo $form->textField($model,'hpp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'harga'); ?>
		<?php echo $form->textField($model,'harga'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->