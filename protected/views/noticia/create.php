<?php
    $this->breadcrumbs   = array('Noticias'=>array('Noticia/admin'),'Crear Nuevo');
    $this->pagetitulo    = 'Noticia';
    $this->pagesubtitulo = 'Crear Nuevo';
    //$this->btncreate     = CHtml::link('Nuevo',array('Noticia/create'),array('class'=>'btn btn-primary'));
    //$this->padding       = 'no-padding';
    $this->pageicon      = 'fa-file-text';
?>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>