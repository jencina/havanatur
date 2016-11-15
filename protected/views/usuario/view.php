
<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'homeLink' => CHtml::link(Yii::t('zii', 'Usuarios'), array('usuario/admin')),
        'links' => array('Detalle'),
    )
);
?>

<div class="page-header">
    <h1>Usuario <small>Detalle #<?php echo $model->id; ?></small></h1>
</div>




<?php
$this->widget(
    'booster.widgets.TbDetailView',
    array(
        'data' => $model,
        'attributes'=>array(
            'id',
            'nombre',
            'apellido',
            'usuario',
            'contrasena',
            array(
                'label' => 'Tipo Usuario',
                'value' => (isset($model->usuarioTipo->nombre))?$model->usuarioTipo->nombre:''
            ),
            'fecha_creacion',
            'fecha_modificacion',

        ),
    )
); ?>
