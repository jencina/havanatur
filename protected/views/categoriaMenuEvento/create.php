<?php
/* @var $this CategoriaMenuEventoController */
/* @var $model CategoriaMenuEvento */

$this->breadcrumbs=array(
	'Categoria Menu Eventos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CategoriaMenuEvento', 'url'=>array('index')),
	array('label'=>'Manage CategoriaMenuEvento', 'url'=>array('admin')),
);
?>

<h1>Create CategoriaMenuEvento</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>