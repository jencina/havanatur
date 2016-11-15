<?php
/* @var $this ConfiguracionController */
/* @var $model Configuracion */

$this->breadcrumbs=array(
	'Configuracions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Configuracion', 'url'=>array('index')),
	array('label'=>'Create Configuracion', 'url'=>array('create')),
	array('label'=>'View Configuracion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Configuracion', 'url'=>array('admin')),
);
?>

<h1>Update Configuracion <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>