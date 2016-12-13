<?php
$this->breadcrumbs   = array('Hotel'=>array('Hotel/admin'));
$this->pagetitulo    = 'Hotel';
$this->pagesubtitulo = 'Administrador';
$this->btncreate     = CHtml::link('Nuevo',array('Hotel/create'),array('class'=>'btn btn-primary'));
$this->padding       = 'no-padding';
$this->pageicon      = 'fa-building-o';
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
        'template' => "{items} {pager}",
        'columns'=>array(
            'id',
            'nombre',
            array('name'=> 'ciudad_id' ,'value'=>'$data->ciudad->nombre'),
            'estrellas',
            'activo',
            array(
                'htmlOptions' => array('nowrap'=>'nowrap'),
                'class'=>'booster.widgets.TbButtonColumn',
                'template'=>'{imagenes} {view} {update} {delete}',
                'buttons'=>array(
                    'imagenes' => array
                    (
                        'options'=>array('title'=>'Fotos Hotel'),
                        'label'=>'<i class="fa fa-file-image-o"> </i>',
                        'url'=>'Yii::app()->createUrl("hotel/fotos", array("id"=>$data->id))',
                    ),
                ),
                'viewButtonUrl'=> 'Yii::app()->createUrl("/hotel/view", array("id"=>$data["id"]))',
                'updateButtonUrl'=>'Yii::app()->createUrl("/hotel/update", array("id"=>$data["id"]))',
                'deleteButtonUrl'=> 'Yii::app()->createUrl("/hotel/delete", array("id"=>$data["id"]))',
            )
        ),
    )
);

?>
