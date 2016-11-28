<?php
/* @var $this NoticiaController */
/* @var $model Noticia */

$this->breadcrumbs=array(
	'Noticias'=>array('index'),
	$model->not_id,
);

$this->menu=array(
	array('label'=>'List Noticia', 'url'=>array('index')),
	array('label'=>'Create Noticia', 'url'=>array('create')),
	array('label'=>'Update Noticia', 'url'=>array('update', 'id'=>$model->not_id)),
	array('label'=>'Delete Noticia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->not_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Noticia', 'url'=>array('admin')),
);
?>

<h1>View Noticia #<?php echo $model->not_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'not_id',
		'not_titulo',
		'not_subtitulo',
		'not_contenido',
		'not_imagen',
		'not_fecha',
		'not_fechacreacion',
		'not_fechamodificacion',
		'usuario_id',
	),
)); ?>
