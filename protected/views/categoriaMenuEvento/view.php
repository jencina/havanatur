<?php
/* @var $this CategoriaMenuEventoController */
/* @var $model CategoriaMenuEvento */

$this->breadcrumbs=array(
	'Categoria Menu Eventos'=>array('index'),
	$model->cat_id,
);

$this->menu=array(
	array('label'=>'List CategoriaMenuEvento', 'url'=>array('index')),
	array('label'=>'Create CategoriaMenuEvento', 'url'=>array('create')),
	array('label'=>'Update CategoriaMenuEvento', 'url'=>array('update', 'id'=>$model->cat_id)),
	array('label'=>'Delete CategoriaMenuEvento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cat_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CategoriaMenuEvento', 'url'=>array('admin')),
);
?>

<h1>View CategoriaMenuEvento #<?php echo $model->cat_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cat_id',
		'cat_nombre',
	),
)); ?>
