<?php
/* @var $this NoticiaController */
/* @var $model Noticia */

$this->breadcrumbs=array(
	'Noticias'=>array('index'),
	'Create',
);

?>

<div class="page-header">
    <h1>Noticia <small>Crear Nuevo</small></h1>
</div>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>