<?php
/* @var $this PartTypeController */
/* @var $model PartType */

$this->breadcrumbs=array(
	'Part Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PartType', 'url'=>array('index')),
	array('label'=>'Manage PartType', 'url'=>array('admin')),
);
?>


<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">Tambah Part Type</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					
					<?php $this->renderPartial('_form', array('model'=>$model)); ?>
				</div>
			</div>
		</div>
	</div>

	
</div>