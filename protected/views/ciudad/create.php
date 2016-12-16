<?php
    $this->breadcrumbs   = array('Ciudad'=>array('Ciudad/admin'),'Crear Nuevo');
    $this->pagetitulo    = 'Ciudad';
    $this->pagesubtitulo = 'Crear Nuevo';
    //$this->btncreate   = CHtml::link('Nuevo',array('Ciudad/create'),array('class'=>'btn btn-primary'));
    //$this->padding     = 'no-padding';
    $this->pageicon      = 'fa-users';
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>