<?php
$this->breadcrumbs     = array('Contenido'=>array('contenido/admin'),'Editar #'.$model->id);
$this->pagetitulo      = 'Contenido';
$this->pagesubtitulo   = 'Editar #'.$model->id;
//$this->btncreate     = CHtml::link('Nuevo',array('contenido/create'),array('class'=>'btn btn-primary'));
//$this->padding       = 'no-padding';
$this->pageicon        = 'fa-keyboard-o';
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>