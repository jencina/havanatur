
<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',

    array(
        'homeLink' => CHtml::link(Yii::t('zii', 'Programa'), array('programa/admin')),
        'links' => array($model->nombre=>array('programa/combinaciones','id'=>$model->id),'Crear Combinacion'),
    )
);
?>



<div class="page-header">
    <h1>Crear Combinacion <small></small></h1>
</div>

<?php $this->renderPartial('_formCombinacion',array(
    'model'   => $model,
    'combi'   => $combi,
    //'hoteles'   => $hoteles,
    'ciudades'=>$ciudades
));?>
