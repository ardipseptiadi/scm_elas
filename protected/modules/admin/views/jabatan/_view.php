<?php
/* @var $this JabatanController */
/* @var $data Jabatan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_jabatan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_jabatan), array('view', 'id'=>$data->id_jabatan)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jabatan')); ?>:</b>
	<?php echo CHtml::encode($data->jabatan); ?>
	<br />


</div>