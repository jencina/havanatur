
<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'homeLink' => CHtml::link(Yii::t('zii', 'Programa'), array('programa/admin')),
        'links' => array('Detalle'),
    )
);
?>

<div class="page-header">
    <h1>Programa <small>Detalle #<?php echo $model->id; ?></small></h1>
</div>

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

