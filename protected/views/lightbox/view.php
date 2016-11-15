<?php
/* @var $this LightboxController */
/* @var $model Lightbox */

$this->breadcrumbs=array(
	'Lightboxes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Lightbox', 'url'=>array('index')),
	array('label'=>'Create Lightbox', 'url'=>array('create')),
	array('label'=>'Update Lightbox', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Lightbox', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Lightbox', 'url'=>array('admin')),
);
?>

<h1>View Lightbox #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'imagen',
		'orden',
		'usuario_id',
		'fecha_creacion',
		'fecha_modificacion',
	),
)); ?>
