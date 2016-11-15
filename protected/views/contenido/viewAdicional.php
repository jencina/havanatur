
<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'homeLink' => CHtml::link(Yii::t('zii', 'Contenido'), array('contenido/admin')),
        'links' => array('Adicional'=>array('contenido/adicional','id'=>$model->contenido_id),'detalle'),
    )
);
?>

<div class="page-header">
    <h1>Contenido <small>Detalle #<?php echo $model->id; ?></small></h1>
</div>



<?php
if($model->contenidoAdicionalTipo->nombre == 'Imagen'){
    foreach($model->contenidoFotos as $foto):
    ?>

    <div class="col-md-12">
        <img style="width: 100%" src="<?php echo Yii::app()->request->baseUrl.'/images/contenidoAdicional/'.$foto->foto;?>" />
    </div>
<?php
    endforeach;
    }
?>

<?php
 $this->widget(
    'booster.widgets.TbDetailView',
    array(
        'data' => $model,
        'attributes'=>array(
            'id',
            'contenido',
        ),
    )
); ?>