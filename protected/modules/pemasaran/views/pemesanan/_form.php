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
		<?php echo $form->labelEx($model,'no_order',['class'=>'col-sm-2 control-label']); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'no_order',array('size'=>50,'maxlength'=>50,'disabled'=>true)); ?>
		</div>
		<?php echo $form->error($model,'no_order'); ?>
	</div>

  <div class="form-group">
		<?php echo $form->labelEx($model,'id_pelanggan',['class'=>'col-sm-2 control-label']); ?>
		<div class="col-sm-10">
			<?php
			echo $form->dropDownList($model, 'id_pelanggan', $list_pelanggan,array(
                                                        'empty'=>'(Pilih Pelanggan)',
                                                        'class'=>'span4 m-wrap'
                                                    ));?>
		</div>
		<?php echo $form->error($model,'id_pelanggan'); ?>
	</div>

  <div class="form-group">
		<?php echo $form->labelEx($model,'tgl_pesan',['class'=>'col-sm-2 control-label']); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'tgl_pesan',array('size'=>50,'maxlength'=>50,'class'=>'tgl_form')); ?>
		</div>
		<?php echo $form->error($model,'tgl_pesan'); ?>
	</div>

    <div class="form-group">
		<?php echo $form->labelEx($model,'tgl_kirim',['class'=>'col-sm-2 control-label']); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'tgl_kirim',array('size'=>50,'maxlength'=>50,'class'=>'tgl_form')); ?>
		</div>
		<?php echo $form->error($model,'tgl_kirim'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::label('Pembayaran','pembayaran',['class'=>'col-sm-2 control-label']);?>
		<div class="col-sm-10">
			<?php
			echo $form->dropDownList($model, 'id_jenis_bayar', $list_jenis_bayar,array(
                                                        'empty'=>'(Pilih Jenis Bayar)',
                                                        'class'=>'span4 m-wrap'
                                                    ));?>
		</div>
		<?php echo $form->error($model,'id_jenis_bayar'); ?>
	</div>

    <div class="form-group">
        <div class="col-sm-10">
            <?php  echo CHtml::dropDownList('produk', 'data_p',
                $list_produk,
                array('empty' => '(Pilih Produk)',
                                'class' => 'span2'
                    )); ?>
			<?php echo CHtml::numberField('qty', '',
                array('id'=>'qty',
                        'class'=>'span2',
                'width'=>11,
								'min'=>1,
                'maxlength'=>11,
                        'placeholder'=>'Quantity',
                    )); ?>
			<?php echo CHtml::button('Tambah', array('class' => 'addCart')); ?>
        </div>
    </div>

    <div>
		<?php
			$total = 0;
			foreach ($cart->rawData as $data_cart) {
				$total += ($data_cart['qty']*$data_cart['harga']);
			}
			$this->widget('zii.widgets.grid.CGridView',array(
					'id' => 'cart-grid',
					'dataProvider' => $cart,
					'summaryText' => false,
					'columns' => array(
						array(
							'name' => 'Produk',
							'type' => 'raw',
							'value' => 'CHtml::encode($data["nama"])',
							'footer'=>'Total'
						),
						array(
							'name' => 'Qty',
							'type' => 'raw',
							'value' => 'CHtml::encode($data["qty"])'
						),
						array(
							'name' => 'Harga',
							'type' => 'raw',
							'value' => 'CHtml::encode($data["harga"])'
						),
						array(
							'name' => 'Subtotal',
							'type' => 'raw',
							'value' => function($data){
								return $data['qty']*$data['harga'];
								},
							'footer'=> $total
						),
						array(
							'header' => 'Aksi',
              'value' => '
                          CHtml::button("Hapus",
                              array(
                                  "id" => $data["id"],
                                  "onclick"=>"js:removecartitem(".
                                                                  $data["id"].",".
                                                                  $data["id_produk"].");",
                                  "class" => "btn btn-danger btn-xs",
                              )
                          );',
              'type' => 'raw',
						),
					),
			));
		?>
	</div>

	<div class="form-actions center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class' => 'btn btn-sm btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>
