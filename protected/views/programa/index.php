<?php
/* @var $this ProgramaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Programas',
);

$this->menu=array(
	array('label'=>'Create Programa', 'url'=>array('create')),
	array('label'=>'Manage Programa', 'url'=>array('admin')),
);
?>

<h1>Programas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
