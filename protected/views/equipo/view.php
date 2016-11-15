
<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'homeLink' => CHtml::link(Yii::t('zii', 'Equipo'), array('equipo/admin')),
        'links' => array('Detalle'),
    )
);
?>

<div class="page-header">
    <h1>Equipo <small>Detalle #<?php echo $model->id; ?></small></h1>
</div>

<div class="col-md-12">
    <div class="col-sm-4 col-md-9">
    <?php
    $this->widget(
        'booster.widgets.TbDetailView',
        array(
            'data' => $model,
            'attributes'=>array(
                'id',
                'cargo',
                'nombre',
                'email',
                'anexo',
            ),
        )
    ); ?>
        </div>
    <div class="col-sm-4 col-md-3">
        <div class="thumbnail">
            <img style="width: 100%" src="<?php echo Yii::app()->request->baseUrl.'/images/equipo/'.$model->foto;?>" />
        </div>
    </div>

</div>




