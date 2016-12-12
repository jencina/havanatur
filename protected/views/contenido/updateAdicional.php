<?php
$this->breadcrumbs   = array('Contenido'=>array('contenido/admin'),'Adicional',$model->contenido0->titulo=>array('contenido/adicional','id'=>$model->contenido0->id),'Editar');
$this->pagetitulo    = 'Contenido Adicional';
$this->pagesubtitulo = 'Editar '.$model->contenido0->titulo;
//$this->btncreate     = CHtml::link('Nuevo',array('contenido/createAdicional','id'=>$contenido->id),array('class'=>'btn btn-primary'));
//$this->padding       = 'no-padding';
$this->pageicon      = 'fa-keyboard-o';
?>


<?php $this->renderPartial('_formAdicional', array('model'=>$model)); ?>