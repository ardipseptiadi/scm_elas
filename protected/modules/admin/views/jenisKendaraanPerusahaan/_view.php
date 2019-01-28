<?php
/* @var $this JenisKendaraanPerusahaanController */
/* @var $data JenisKendaraanPerusahaan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_jenis_kendaraan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_jenis_kendaraan), array('view', 'id'=>$data->id_jenis_kendaraan)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis')); ?>:</b>
	<?php echo CHtml::encode($data->jenis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kapasitas')); ?>:</b>
	<?php echo CHtml::encode($data->kapasitas); ?>
	<br />


</div>