<?php
$this->breadcrumbs   = array('Lightbox'=>array('Lightbox/admin'),'Ediatar #'.$model->id);
$this->pagetitulo    = 'Lightbox';
$this->pagesubtitulo = 'Ediatar #'.$model->id;
//$this->btncreate     = CHtml::link('Nuevo',array('Lightbox/create'),array('class'=>'btn btn-primary'));
//$this->padding       = 'no-padding';
$this->pageicon      = 'fa-caret-square-o-right';
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>