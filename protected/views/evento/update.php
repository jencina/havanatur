<?php
    $this->breadcrumbs   = array('Eventos'=>array('evento/admin'),'editar');
    $this->pagetitulo    = 'Eventos';
    $this->pagesubtitulo = 'Editar';
    //$this->btncreate     = CHtml::link('Nuevo',array('evento/create'),array('class'=>'btn btn-primary'));
    //$this->padding       = 'no-padding';
    $this->pageicon      = 'fa-map-marker ';
?>


<?php $this->renderPartial('_form', array(
                        'model'=>$model,
                        'hoteles'=> $hoteles,
                        'tarifa' => $tarifa)); ?>