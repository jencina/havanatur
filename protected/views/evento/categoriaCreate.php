<?php
$this->breadcrumbs   = array('Eventos','Categoria'=>array('evento/categorias'),'Crear Nuevo');
$this->pagetitulo    = 'Categoria';
$this->pagesubtitulo = 'Crear Nuevo';
//$this->btncreate     = CHtml::link('Nuevo',array('noticia/categoriaCreate'),array('class'=>'btn btn-primary'));
//$this->padding       = 'no-padding';
$this->pageicon      = 'fa-file-text';
?>


<?php $this->renderPartial('_categoriaForm', array('model'=>$model)); ?>