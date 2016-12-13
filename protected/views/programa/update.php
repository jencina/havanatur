<?php
$this->breadcrumbs   = array('Programa'=>array('programa/admin'),$model->nombre,'Editar');
$this->pagetitulo    = 'Programa';
$this->pagesubtitulo = 'Editar #'.$model->id;
//$this->btncreate     = CHtml::link('Nuevo',array('programa/create'),array('class'=>'btn btn-primary'));
//$this->padding       = 'no-padding';
$this->pageicon      = 'fa-plane';
?>

<?php $this->renderPartial('_form', array('model'=>$model,'ciudades'=>$ciudades)); ?>