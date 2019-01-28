<?php
/* @var $this PetugasController */
/* @var $data Petugas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_petugas')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_petugas), array('view', 'id'=>$data->id_petugas)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat')); ?>:</b>
	<?php echo CHtml::encode($data->alamat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mulai_bekerja')); ?>:</b>
	<?php echo CHtml::encode($data->mulai_bekerja); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>