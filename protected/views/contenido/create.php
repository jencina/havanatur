
<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'homeLink' => CHtml::link(Yii::t('zii', 'Contenido'), array('Contenido/admin')),
        'links' => array('Crear Nuevo'),
    )
);
?>


<div class="page-header">
    <h1>Contenido <small>Crear Nuevo</small></h1>
</div>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>