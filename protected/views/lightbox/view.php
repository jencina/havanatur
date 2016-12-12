<?php
$this->breadcrumbs   = array('Lightbox'=>array('Lightbox/admin'),'Detalle #'.$model->id);
$this->pagetitulo    = 'Lightbox';
$this->pagesubtitulo = 'Detalle #'.$model->id;
//$this->btncreate     = CHtml::link('Nuevo',array('Lightbox/create'),array('class'=>'btn btn-primary'));
//$this->padding       = 'no-padding';
$this->pageicon      = 'fa-caret-square-o-right';
?>

<?php
$this->widget(
    'booster.widgets.TbDetailView',
    array(
        'data' => $model,
        'attributes'=>array(
            'id',
            'imagen',
            'orden',
            array(
                'label' => 'Usuario',
                'value' => (isset($model->usuario->nombre))?$model->usuario->nombre:''
            ),
            'fecha_creacion',
            'fecha_modificacion',

        ),
    )
); ?>

