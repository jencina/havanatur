<?php
$this->breadcrumbs   = array('Programa'=>array('programa/admin'),$model->nombre=>array('programa/combinaciones','id'=>$model->id),'Combinaciones','Crear Combinacion');
$this->pagetitulo    = 'Combinaciones';
$this->pagesubtitulo = 'Crear Combinacion';
//$this->btncreate     = CHtml::link('Nuevo',array('programa/addCombinacion','id'=>$model->id),array('class'=>'btn btn-primary'));
//$this->padding       = 'no-padding';
$this->pageicon      = 'fa-plane';
?>


<?php $this->renderPartial('_formCombinacion',array(
    'model'   => $model,
    'combi'   => $combi,
    //'hoteles'   => $hoteles,
    'ciudades'=>$ciudades
));?>
