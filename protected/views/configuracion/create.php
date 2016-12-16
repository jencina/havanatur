<?php
$this->breadcrumbs   = array('Configuracion'=>array('configuracion/admin'),'Crear Nuevo');
$this->pagetitulo    = 'Configuracion';
$this->pagesubtitulo = 'Administrador';
//$this->btncreate     = CHtml::link('Nuevo',array('configuracion/create'),array('class'=>'btn btn-primary'));
//$this->padding       = 'no-padding';
$this->pageicon      = 'fa-cog';
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>