<?php
/* @var $this PartTypeController */
/* @var $model PartType */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_part_type'); ?>
		<?php echo $form->textField($model,'id_part_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deskripsi_part'); ?>
		<?php echo $form->textField($model,'deskripsi_part'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->