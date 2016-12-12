<?php
$this->breadcrumbs   = array('Equipo'=>array('equipo/admin'));
$this->pagetitulo    = 'Equipo';
$this->pagesubtitulo = 'Administrador';
$this->btncreate     = CHtml::link('Nuevo',array('equipo/create'),array('class'=>'btn btn-primary'));
$this->padding       = 'no-padding';
$this->pageicon      = 'fa-users';
?>

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
