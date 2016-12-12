<?php
$this->breadcrumbs   = array('Carrusel'=>array('carousel/admin'),'Crear Nuevo');
$this->pagetitulo    = 'Carrusel';
$this->pagesubtitulo = 'Crear Nuevo';
//$this->btncreate     = CHtml::link('Nuevo',array('carousel/create'),array('class'=>'btn btn-primary'));
//$this->padding       = 'no-padding';
$this->pageicon      = 'fa-picture-o';
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>