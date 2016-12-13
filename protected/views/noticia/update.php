<?php
    $this->breadcrumbs   = array('Noticias'=>array('Noticia/admin'),$model->not_id=>array('view','id'=>$model->not_id),'Editar');
    $this->pagetitulo    = 'Noticia';
    $this->pagesubtitulo = 'Editar';
    //$this->btncreate     = CHtml::link('Nuevo',array('Noticia/create'),array('class'=>'btn btn-primary'));
    //$this->padding       = 'no-padding';
    $this->pageicon      = 'fa-file-text';
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>