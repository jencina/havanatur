<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'homeLink' => 'Equipo',
        'links' => array(''),
    )
);
?>


<div class="page-header">
    <h1>Equipo <small>Administrador</small>
        <?php echo CHtml::link('Nuevo',array('equipo/create'),array('class'=>'btn btn-primary'));?>
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
            'cargo',
            'nombre',
            'foto',
            'email',
            'anexo',
            array(
                'htmlOptions' => array('nowrap'=>'nowrap'),
                'class'=>'booster.widgets.TbButtonColumn',
                'template'=>'{view} {update} {delete}',
                'viewButtonUrl'=> 'Yii::app()->createUrl("/equipo/view", array("id"=>$data["id"]))',
                'updateButtonUrl'=>'Yii::app()->createUrl("/equipo/update", array("id"=>$data["id"]))',
                'deleteButtonUrl'=> 'Yii::app()->createUrl("/equipo/delete", array("id"=>$data["id"]))',
            )
        ),
    )
);

?>
