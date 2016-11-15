
<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'homeLink' => CHtml::link(Yii::t('zii', 'Contenido'), array('contenido/admin')),
        'links' => array('Detalle'),
    )
);
?>

<div class="page-header">
    <h1>Contenido <small>Detalle #<?php echo $model->id; ?></small></h1>
</div>



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

