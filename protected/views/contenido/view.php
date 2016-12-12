<?php
$this->breadcrumbs     = array('Contenido'=>array('contenido/admin'),'Detalle #'.$model->id);
$this->pagetitulo      = 'Contenido';
$this->pagesubtitulo   = 'Detalle #'.$model->id;
//$this->btncreate     = CHtml::link('Nuevo',array('contenido/create'),array('class'=>'btn btn-primary'));
//$this->padding       = 'no-padding';
$this->pageicon        = 'fa-keyboard-o';
?>

<?php
$this->widget(
    'booster.widgets.TbDetailView',
    array(
        'data' => $model,
        'attributes'=>array(
            'id',
            'titulo',
            'contenido',

            array(
                'label' => 'Tipo Contenido',
                'value' => (isset($model->contenidoTipo->nombre))?$model->contenidoTipo->nombre:''
            ),

        ),
    )
); ?>

