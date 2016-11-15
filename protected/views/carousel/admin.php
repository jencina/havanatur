<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'homeLink' => 'Usuarios',
        'links' => array(''),
    )
);
?>


<div class="page-header">
    <h1>Carousel <small>Administrador</small>
        <?php echo CHtml::link('Nuevo',array('carousel/create'),array('class'=>'btn btn-primary'));?>
    </h1>
</div>

<?php
$this->widget(
    'booster.widgets.TbGridView',
    array(
        'type' => 'striped',
        'dataProvider' => $model->search(),
        'filter'=>$model,
        'template' => "{items} {pager}",
        'columns'=>array(
            'id',
            'foto',
            'orden',
            'descripcion',
            'titulo',
            'activo',
            array(
                'htmlOptions' => array('nowrap'=>'nowrap'),
                'class'=>'booster.widgets.TbButtonColumn',
                'viewButtonUrl'=> 'Yii::app()->createUrl("/carousel/view", array("id"=>$data["id"]))',
                'updateButtonUrl'=>'Yii::app()->createUrl("/carousel/update", array("id"=>$data["id"]))',
                'deleteButtonUrl'=> 'Yii::app()->createUrl("/carousel/delete", array("id"=>$data["id"]))',
            )
        ),
    )
);
?>

