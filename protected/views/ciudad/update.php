<?php
    $this->breadcrumbs   = array('Ciudad'=>array('Ciudad/admin'),'Editar');
    $this->pagetitulo    = 'Ciudad';
    $this->pagesubtitulo = 'Editar #'.$model->id;
    //$this->btncreate   = CHtml::link('Nuevo',array('Ciudad/create'),array('class'=>'btn btn-primary'));
    //$this->padding     = 'no-padding';
    $this->pageicon      = 'fa-users';
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>