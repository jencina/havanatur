<?php
    $this->breadcrumbs   = array('Eventos'=>array('evento/admin'),'Crear Nuevo');
    $this->pagetitulo    = 'Eventos';
    $this->pagesubtitulo = 'Crear Nuevo';
    //$this->btncreate     = CHtml::link('Nuevo',array('noticia/categoriaCreate'),array('class'=>'btn btn-primary'));
    //$this->padding       = 'no-padding';
    $this->pageicon      = ' fa-map-marker ';
?>

<?php $this->renderPartial('_form', array(
    'model'=>$model,
    'hoteles'=> $hoteles,
    'tarifa' => $tarifa
        )); ?>