<?php
/* @var $this KotaController */
/* @var $data Kota */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kota')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_kota), array('view', 'id'=>$data->id_kota)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_provinsi')); ?>:</b>
	<?php echo CHtml::encode($data->id_provinsi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />


</div>