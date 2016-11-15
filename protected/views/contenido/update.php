<?php
/* @var $this ContenidoController */
/* @var $model Contenido */

$this->breadcrumbs=array(
	'Contenidos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Contenido', 'url'=>array('index')),
	array('label'=>'Create Contenido', 'url'=>array('create')),
	array('label'=>'View Contenido', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Contenido', 'url'=>array('admin')),
);
?>

<h1>Update Contenido <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>