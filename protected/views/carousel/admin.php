<?php
$this->breadcrumbs   = array('Carrusel'=>array('carousel/admin'));
$this->pagetitulo    = 'Carrusel';
$this->pagesubtitulo = 'Administrador';
$this->btncreate     = CHtml::link('Nuevo',array('carousel/create'),array('class'=>'btn btn-primary'));
$this->padding       = 'no-padding';
$this->pageicon      = 'fa-picture-o';
?>

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

