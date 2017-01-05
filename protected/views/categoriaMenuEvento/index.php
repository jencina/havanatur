<?php
/* @var $this CategoriaMenuEventoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Categoria Menu Eventos',
);

$this->menu=array(
	array('label'=>'Create CategoriaMenuEvento', 'url'=>array('create')),
	array('label'=>'Manage CategoriaMenuEvento', 'url'=>array('admin')),
);
?>

<h1>Categoria Menu Eventos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
