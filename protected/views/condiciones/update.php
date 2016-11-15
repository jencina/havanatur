
<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'homeLink' => CHtml::link(Yii::t('zii', 'Condiciones Generales'), array('condiciones/admin')),
        'links' => array('Editar'),
    )
);
?>


<div class="page-header">
    <h1>Condiciones Generales <small>Editar</small></h1>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>