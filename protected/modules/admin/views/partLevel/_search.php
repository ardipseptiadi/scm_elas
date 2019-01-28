<?php
/* @var $this PartLevelController */
/* @var $model PartLevel */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_part_level'); ?>
		<?php echo $form->textField($model,'id_part_level'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'part_level_desc'); ?>
		<?php echo $form->textField($model,'part_level_desc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->