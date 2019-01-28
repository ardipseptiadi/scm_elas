<?php
/* @var $this KendaraanPerusahaanController */
/* @var $data KendaraanPerusahaan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kendaraan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_kendaraan), array('view', 'id'=>$data->id_kendaraan)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_jenis_kendaraan')); ?>:</b>
	<?php echo CHtml::encode($data->id_jenis_kendaraan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_petugas')); ?>:</b>
	<?php echo CHtml::encode($data->id_petugas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_polisi')); ?>:</b>
	<?php echo CHtml::encode($data->no_polisi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>