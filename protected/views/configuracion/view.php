
<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'homeLink' => CHtml::link(Yii::t('zii', 'Configuracion'), array('configuracion/admin')),
        'links' => array('Detalle'),
    )
);
?>

<div class="page-header">
    <h1>Hotel <small>Detalle #<?php echo $model->id; ?></small></h1>
</div>

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

