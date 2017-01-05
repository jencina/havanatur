<?php
/* @var $this CategoriaMenuEventoController */
/* @var $model CategoriaMenuEvento */

$this->breadcrumbs=array(
	'Categoria Menu Eventos'=>array('index'),
	$model->cat_id=>array('view','id'=>$model->cat_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CategoriaMenuEvento', 'url'=>array('index')),
	array('label'=>'Create CategoriaMenuEvento', 'url'=>array('create')),
	array('label'=>'View CategoriaMenuEvento', 'url'=>array('view', 'id'=>$model->cat_id)),
	array('label'=>'Manage CategoriaMenuEvento', 'url'=>array('admin')),
);
?>

<h1>Update CategoriaMenuEvento <?php echo $model->cat_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>