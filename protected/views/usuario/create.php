<?php
$this->breadcrumbs   = array('Usuarios'=>array('usuario/admin'),'Crear Nuevo');
$this->pagetitulo    = 'Usuarios';
$this->pagesubtitulo = 'Crear Nuevo';
$this->pageicon      = 'fa-user';
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>