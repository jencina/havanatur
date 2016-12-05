<?php
/* @var $this NoticiaController */
/* @var $model Noticia */

$this->breadcrumbs=array(
	'Evento'=>array('index'),
	'Create',
);

?>

<div class="page-header">
    <h1>Eventos <small>Crear Nuevo</small></h1>
</div>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>