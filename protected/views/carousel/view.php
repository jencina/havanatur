
<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'homeLink' => CHtml::link(Yii::t('zii', 'Carousel'), array('carousel/admin')),
        'links' => array('Detalle'),
    )
);
?>

<div class="page-header">
    <h1>Carousel <small>Detalle #<?php echo $model->id; ?></small></h1>
</div>



<div class="col-md-12">
    <img style="width: 100%" src="<?php echo Yii::app()->request->baseUrl.'/images/carousel/'.$model->foto;?>" />
</div>

<?php
$this->widget(
    'booster.widgets.TbDetailView',
    array(
        'data' => $model,
        'attributes'=>array(
            'id',
            'foto',
            'orden',
            'descripcion',
            'titulo',
            'activo',
            array(
                'label' => 'Usuario',
                'value' => (isset($model->usuario->nombre))?$model->usuario->nombre:''
            ),
            'fecha_creacion',
            'fecha_modificacion',

        ),
    )
); ?>