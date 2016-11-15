<?php
/* @var $this LightboxController */
/* @var $model Lightbox */

$this->breadcrumbs=array(
	'Lightboxes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Lightbox', 'url'=>array('index')),
	array('label'=>'Create Lightbox', 'url'=>array('create')),
	array('label'=>'View Lightbox', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Lightbox', 'url'=>array('admin')),
);
?>

<h1>Update Lightbox <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>