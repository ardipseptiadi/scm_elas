<?php
/* @var $this ProvinsiController */
/* @var $data Provinsi */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_provinsi')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_provinsi), array('view', 'id'=>$data->id_provinsi)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />


</div>