<?php
$this->breadcrumbs   = array('Programa'=>array('programa/admin'),'Crear Nuevo');
$this->pagetitulo    = 'Programa';
$this->pagesubtitulo = 'Crear Nuevo';
//$this->btncreate     = CHtml::link('Nuevo',array('programa/create'),array('class'=>'btn btn-primary'));
//$this->padding       = 'no-padding';
$this->pageicon      = 'fa-plane';
?>


<?php $this->renderPartial('_form', array('model'=>$model,'ciudades'=>$ciudades)); ?>