<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'homeLink' => 'Ciudad',
        'links' => array(''),
    )
);
?>


<div class="page-header">
    <h1>Ciudad <small>Administrador</small>
        <?php echo CHtml::link('Nuevo',array('ciudad/create'),array('class'=>'btn btn-primary'));?>
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
            'nombre',
            'codigo',
            array(
                'htmlOptions' => array('nowrap'=>'nowrap'),
                'class'=>'booster.widgets.TbButtonColumn',
                'viewButtonUrl'=> 'Yii::app()->createUrl("/ciudad/view", array("id"=>$data["id"]))',
                'updateButtonUrl'=>'Yii::app()->createUrl("/ciudad/update", array("id"=>$data["id"]))',
                'deleteButtonUrl'=> 'Yii::app()->createUrl("/ciudad/delete", array("id"=>$data["id"]))',
            )
        ),
    )
);
?>

