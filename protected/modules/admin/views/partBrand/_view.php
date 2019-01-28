<?php
/* @var $this PartBrandController */
/* @var $data PartBrand */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_part_brand')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_part_brand), array('view', 'id'=>$data->id_part_brand)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brand_name')); ?>:</b>
	<?php echo CHtml::encode($data->brand_name); ?>
	<br />


</div>