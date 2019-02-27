<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pemesanan-form',
	'htmlOptions'=>array('class'=>'form-horizontal'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<!--<p class="note">Fields with <span class="required">*</span> are requireds.</p>-->

	<?php echo $form->errorSummary($model); ?>

  <div class="form-group">
		<?php echo $form->labelEx($model,'Bulan Peramalan',['class'=>'col-sm-5 control-label']); ?>
		<div class="col-sm-4">
			<?php echo $form->textField($model,'bln_ramal',array('size'=>14,'maxlength'=>14,'class'=>'bln_form')); ?>
		</div>
		<?php echo $form->error($model,'bln_ramal'); ?>
	</div>

  <div class="form-group">
		<?php echo $form->labelEx($model,'Data diambil dari bulan',['class'=>'col-sm-5 control-label']); ?>
		<div class="col-sm-4">
			<?php echo $form->textField($model,'bln_data',array('size'=>14,'maxlength'=>14,'class'=>'bln_form')); ?>
		</div>
		<?php echo $form->error($model,'bln_data'); ?>
	</div>

  <div class="form-group">
    <?php echo $form->labelEx($model,'id_bahanbaku',['class'=>'col-sm-5 control-label']); ?>
    <div class="col-sm-4">
      <?php echo $form->dropDownList($model,'id_bahanbaku',$list_produk,['empty'=>'Pilih']); ?>
    </div>
    <?php echo $form->error($model,'id_bahanbaku'); ?>
  </div>

	<div class="form-actions center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class' => 'btn btn-sm btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>
