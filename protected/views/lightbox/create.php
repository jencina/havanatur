<?php
$this->breadcrumbs   = array('Lightbox'=>array('Lightbox/admin'),'Crear Nuevo');
$this->pagetitulo    = 'Lightbox';
$this->pagesubtitulo = 'Crear Nuevo';
//$this->btncreate     = CHtml::link('Nuevo',array('Lightbox/create'),array('class'=>'btn btn-primary'));
//$this->padding       = 'no-padding';
$this->pageicon      = 'fa-caret-square-o-right';
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>