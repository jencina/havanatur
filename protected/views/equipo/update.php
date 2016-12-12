<?php
$this->breadcrumbs   = array('Equipo'=>array('equipo/admin'),'Editar #'.$model->id);
$this->pagetitulo    = 'Equipo';
$this->pagesubtitulo = 'Editar #'.$model->id;
//$this->btncreate     = CHtml::link('Nuevo',array('equipo/create'),array('class'=>'btn btn-primary'));
//$this->padding       = 'no-padding';
$this->pageicon      = 'fa-users';
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>