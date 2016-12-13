<?php
$this->breadcrumbs   = array('Programa'=>array('programa/admin'),$model->nombre);
$this->pagetitulo    = 'Programa';
$this->pagesubtitulo = 'Detalle #'.$model->nombre;
//$this->btncreate     = CHtml::link('Nuevo',array('programa/create'),array('class'=>'btn btn-primary'));
//$this->padding       = 'no-padding';
$this->pageicon      = 'fa-plane';
?>

<?php
$this->widget(
    'booster.widgets.TbDetailView',
    array(
        'data' => $model,
        'attributes'=>array(
            'id',
            'nombre',
            'precio_desde',
            array(
                'label'=>'descripcion',
                'value'=>$model->descripcion,
                'type'=>'html'
            ),

            //'descripcion',
            array(
                'label' => 'Tipo Programa',
                'value' => (isset($model->programaTipo->nombre))?$model->programaTipo->nombre:''
            ),
            'orden',
            'activo',
            'destacado',
            'fecha_creacion',
            'fecha_modificacion',
        ),
    )
); ?>

