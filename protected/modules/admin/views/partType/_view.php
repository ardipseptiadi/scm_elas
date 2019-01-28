<?php
/* @var $this PartTypeController */
/* @var $data PartType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_part_type')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_part_type), array('view', 'id'=>$data->id_part_type)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deskripsi_part')); ?>:</b>
	<?php echo CHtml::encode($data->deskripsi_part); ?>
	<br />


</div>