<?php
/* @var $this PartController */
/* @var $data Part */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_part')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_part), array('view', 'id'=>$data->id_part)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_parent')); ?>:</b>
	<?php echo CHtml::encode($data->id_parent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_brand')); ?>:</b>
	<?php echo CHtml::encode($data->id_brand); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_part_level')); ?>:</b>
	<?php echo CHtml::encode($data->id_part_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_part_type')); ?>:</b>
	<?php echo CHtml::encode($data->id_part_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('part_code')); ?>:</b>
	<?php echo CHtml::encode($data->part_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_part')); ?>:</b>
	<?php echo CHtml::encode($data->nama_part); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('berat')); ?>:</b>
	<?php echo CHtml::encode($data->berat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('satuan')); ?>:</b>
	<?php echo CHtml::encode($data->satuan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hpp')); ?>:</b>
	<?php echo CHtml::encode($data->hpp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('harga')); ?>:</b>
	<?php echo CHtml::encode($data->harga); ?>
	<br />

	*/ ?>

</div>