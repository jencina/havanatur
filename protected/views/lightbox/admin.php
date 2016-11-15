<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'homeLink' => 'Lightbox',
        'links' => array(''),
    )
);
?>


<div class="page-header">
    <h1>Lightbox <small>Administrador</small>
        <?php echo CHtml::link('Nuevo',array('Lightbox/create'),array('class'=>'btn btn-primary'));?>
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
        'template' => "{items} {pager}",
        'columns'=>array(
            'id',
            'imagen',
            'orden',
            'usuario_id',
            'fecha_creacion',
            /*array(
                'name'  => 'activo',
                'header'=> 'activo',
                'type' => 'raw',
                'value'=> "Yii::app()->controller->widget(
                    'booster.widgets.TbSwitch',
                    array(
                        'name' => 'activo',
                                'options' => array(
                                    'state' => false,
                                    'size' => 'large',
                                    'onColor' => 'success',
                                    'offColor' => 'danger',
                        ),
                        'events' => array(

                            'switchChange' => 'js:function(a,b){console.log(b);}'
                        )
                    ),true
                )",
            ),*/
            array(
                'htmlOptions' => array('nowrap'=>'nowrap'),
                'class'=>'booster.widgets.TbButtonColumn',
                'template'=>'{view} {update} {delete}',
                'viewButtonUrl'=> 'Yii::app()->createUrl("/lightbox/view", array("id"=>$data["id"]))',
                'updateButtonUrl'=>'Yii::app()->createUrl("/lightbox/update", array("id"=>$data["id"]))',
                'deleteButtonUrl'=> 'Yii::app()->createUrl("/lightbox/delete", array("id"=>$data["id"]))',
            )
        ),
    )
);

?>
