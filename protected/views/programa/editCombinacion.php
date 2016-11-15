
<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',

    array(
        'homeLink' => CHtml::link(Yii::t('zii', 'Programa'), array('programa/admin')),
        'links' => array($model->nombre=>array('programa/combinaciones','id'=>$combi->programa_id),'Editar Combinacion'),
    )
);
?>



<div class="page-header">
    <h1>Crear Combinacion <small></small></h1>
</div>

<?php $this->renderPartial('_formCombinacion',array(
    'combi'   => $combi,
));?>
