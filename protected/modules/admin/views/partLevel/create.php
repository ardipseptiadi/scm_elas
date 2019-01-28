<?php
/* @var $this PartLevelController */
/* @var $model PartLevel */

$this->breadcrumbs=array(
	'Part Levels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PartLevel', 'url'=>array('index')),
	array('label'=>'Manage PartLevel', 'url'=>array('admin')),
);
?>


<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">Tambah Part Level</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					
					<?php $this->renderPartial('_form', array('model'=>$model)); ?>
				</div>
			</div>
		</div>
	</div>

	
</div>