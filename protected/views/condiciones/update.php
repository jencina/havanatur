<?php
$this->breadcrumbs   = array('Condiciones'=>array('condiciones/admin'),'Editar');
$this->pagetitulo    = 'Condiciones';
$this->pagesubtitulo = 'Editar #'.$model->id;
//$this->btncreate     = CHtml::link('Nuevo',array('condiciones/create'),array('class'=>'btn btn-primary'));
//$this->padding       = 'no-padding';
$this->pageicon      = 'fa-users';
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>