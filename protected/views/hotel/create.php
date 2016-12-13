<?php
$this->breadcrumbs   = array('Hotel'=>array('Hotel/admin'),'Crear Nuevo');
$this->pagetitulo    = 'Hotel';
$this->pagesubtitulo = 'Crear Nuevo';
//$this->btncreate     = CHtml::link('Nuevo',array('Hotel/create'),array('class'=>'btn btn-primary'));
//$this->padding       = 'no-padding';
$this->pageicon      = 'fa-building-o';
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>