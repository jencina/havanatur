<?php
/* @var $this CotizacionController */
/* @var $model Cotizacion */

$this->breadcrumbs=array(
	'Cotizacions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Cotizacion', 'url'=>array('index')),
	array('label'=>'Create Cotizacion', 'url'=>array('create')),
	array('label'=>'Update Cotizacion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Cotizacion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cotizacion', 'url'=>array('admin')),
);
?>

<h1>View Cotizacion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'apellidos',
		'telefono',
		'email',
		'fecha_creacion',
		'comentario',
		'respondido',
		'programa_combinacion_vigencia_id',
	),
)); ?>
