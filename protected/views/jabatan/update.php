<?php
/* @var $this JabatanController */
/* @var $model Jabatan */

$this->breadcrumbs=array(
	'Jabatans'=>array('index'),
	$model->id_jabatan=>array('view','id'=>$model->id_jabatan),
	'Update',
);

$this->menu=array(
	array('label'=>'List Jabatan', 'url'=>array('index')),
	array('label'=>'Create Jabatan', 'url'=>array('create')),
	array('label'=>'View Jabatan', 'url'=>array('view', 'id'=>$model->id_jabatan)),
	array('label'=>'Manage Jabatan', 'url'=>array('admin')),
);
?>

<h1>Update Jabatan <?php echo $model->id_jabatan; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>