<?php
/* @var $this ProdukController */
/* @var $model Produk */

$this->breadcrumbs=array(
	'Produk'=>array('index'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'List Produk', 'url'=>array('index')),
	array('label'=>'Atur Produk', 'url'=>array('admin')),
);
?>


<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">Tambah Produk</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">

					<?php $this->renderPartial('_form', get_defined_vars()); ?>
				</div>
			</div>
		</div>
	</div>


</div>
