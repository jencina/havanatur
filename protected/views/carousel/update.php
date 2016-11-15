<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'homeLink' => CHtml::link(Yii::t('zii', 'Carousel'), array('carousel/admin')),
        'links' => array('Update'),
    )
);
?>

    <div class="page-header">
        <h1>Carousel <small>Editar #<?php echo $model->id; ?></small></h1>
    </div>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>