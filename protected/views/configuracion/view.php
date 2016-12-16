<?php
$this->breadcrumbs   = array('Configuracion'=>array('configuracion/admin'),'Detalle');
$this->pagetitulo    = 'Configuracion';
$this->pagesubtitulo = 'Detalle #'.$model->id;
//$this->btncreate     = CHtml::link('Nuevo',array('configuracion/create'),array('class'=>'btn btn-primary'));
//$this->padding       = 'no-padding';
$this->pageicon      = 'fa-cog';
?>

<?php
$this->widget(
    'booster.widgets.TbDetailView',
    array(
        'data' => $model,
        'attributes'=>array(
            'id',
            'nombre',
            'valor',
            'fecha_creacion',
            'fecha_modificacion',
        ),
    )
); ?>

