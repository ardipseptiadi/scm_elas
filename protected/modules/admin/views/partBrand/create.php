<?php
/* @var $this PartBrandController */
/* @var $model PartBrand */

$this->breadcrumbs=array(
	'Part Brands'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PartBrand', 'url'=>array('index')),
	array('label'=>'Manage PartBrand', 'url'=>array('admin')),
);
?>


<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">Tambah Part Brand</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					
					<?php $this->renderPartial('_form', array('model'=>$model)); ?>
				</div>
			</div>
		</div>
	</div>

	
</div>