
<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'homeLink' => CHtml::link(Yii::t('zii', 'Condiciones Generales'), array('condiciones/admin')),
        'links' => array('Detalle'),
    )
);
?>

<div class="page-header">
    <h1>Condiciones <small>Detalle #<?php echo $model->id; ?></small></h1>
</div>

<?php
$this->widget(
    'booster.widgets.TbDetailView',
    array(
        'data' => $model,
        'attributes'=>array(
            'id',
            'contenido'
            
        ),
    )
); ?>

<div class="form-actions col-md-12" >
        
        <?php echo CHtml::link('Volver',array('condiciones/admin'),array('class'=>'btn btn-danger')); ?>
    </div>

