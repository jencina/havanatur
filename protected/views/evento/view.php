<?php
/* @var $this EventoController */
/* @var $model Evento */

$this->breadcrumbs=array(
	'Eventos'=>array('index'),
	$model->even_id,
);

$this->menu=array(
	array('label'=>'List Evento', 'url'=>array('index')),
	array('label'=>'Create Evento', 'url'=>array('create')),
	array('label'=>'Update Evento', 'url'=>array('update', 'id'=>$model->even_id)),
	array('label'=>'Delete Evento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->even_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Evento', 'url'=>array('admin')),
);
?>

<h1>View Evento #<?php echo $model->even_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'even_id',
		'even_titulo',
		'even_subtitulo',
		'even_contenido',
		'even_imagen',
		'even_imagen_detail',
		'even_fecha',
		'even_fechacreacion',
		'even_fechamodificacion',
		'even_destacado',
		'even_activo',
		'usuario_id',
		'even_email',
		'even_telefono_1',
		'even_telefono_2',
		'even_cat_id',
	),
)); ?>
