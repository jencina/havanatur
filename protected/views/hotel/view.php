<?php
$this->breadcrumbs   = array('Hotel'=>array('Hotel/admin'),$model->nombre,'Detalle');
$this->pagetitulo    = 'Hotel';
$this->pagesubtitulo = 'Detalle #'.$model->id;
//$this->btncreate     = CHtml::link('Nuevo',array('Hotel/create'),array('class'=>'btn btn-primary'));
//$this->padding       = 'no-padding';
$this->pageicon      = 'fa-building-o';
?>

<?php
$this->widget(
    'booster.widgets.TbDetailView',
    array(
        'data' => $model,
        'attributes'=>array(
            'id',
            'nombre',
            'descripcion',
            'estrellas',
            'activo',
            'mapa',
            'fecha_creacion',
            'fecha_modificacion'
        ),
    )
); ?>

<div class="page-header">
    <h1>Fotos</h1>
</div>
