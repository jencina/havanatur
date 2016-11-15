
<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'homeLink' => CHtml::link(Yii::t('zii', 'Ciudad'), array('ciudad/admin')),
        'links' => array('Detalle'),
    )
);
?>

<div class="page-header">
    <h1>Ciudad <small>Detalle #<?php echo $model->id; ?></small></h1>
</div>

<?php
$this->widget(
    'booster.widgets.TbDetailView',
    array(
        'data' => $model,
        'attributes'=>array(
            'id',
            'nombre',
            'codigo',
        ),
    )
); ?>

<div class="form-actions col-md-12" >
    <?php echo CHtml::link('Volver',array('ciudad/admin'),array('class'=>'btn btn-danger')); ?>
</div>