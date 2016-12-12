<?php
$this->breadcrumbs   = array('Usuarios'=>array('usuario/admin'),'Editar');
$this->pagetitulo    = 'Usuarios';
$this->pagesubtitulo = 'Editar #'.$model->id;
$this->pageicon      = 'fa-user';
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>