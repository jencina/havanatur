<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'homeLink' => 'Configuraciones',
        'links' => array(''),
    )
);
?>


<div class="page-header">
    <h1>Configuracion <small>Administrador</small>
        <?php echo CHtml::link('Nuevo',array('configuracion/create'),array('class'=>'btn btn-primary'));?>
    </h1>
</div>

<?php

$this->widget(
    'booster.widgets.TbExtendedGridView',
    array(
        'fixedHeader' => true,
        'headerOffset' => 40,
        // 40px is the height of the main navigation at bootstrap
        'type' => 'striped',
        'dataProvider' => $model->search(),
        'filter'=>$model,
        'responsiveTable' => true,
        'template' => "{items}",
        'columns'=>array(
            'id',
            'nombre',
            'valor',
            'valor2',
            array(
                'htmlOptions' => array('nowrap'=>'nowrap'),
                'class'=>'booster.widgets.TbButtonColumn',
                'template'=>'{view} {update} ',
               // 'template'=>'{view} {update} {delete}',
                'viewButtonUrl'=> 'Yii::app()->createUrl("/configuracion/view", array("id"=>$data["id"]))',
                'updateButtonUrl'=>'Yii::app()->createUrl("/configuracion/update", array("id"=>$data["id"]))',
               // 'deleteButtonUrl'=> 'Yii::app()->createUrl("/configuracion/delete", array("id"=>$data["id"]))',
            )
        ),
    )
);

?>
