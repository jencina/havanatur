
<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'homeLink' => CHtml::link(Yii::t('zii', 'Hotel'), array('hotel/admin')),
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
