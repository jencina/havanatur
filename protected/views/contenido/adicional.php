<?php
$this->breadcrumbs   = array('Contenido'=>array('contenido/admin'),'Adicional',$contenido->titulo);
$this->pagetitulo    = 'Contenido Adicional';
$this->pagesubtitulo = $contenido->titulo;
$this->btncreate     = CHtml::link('Nuevo',array('contenido/createAdicional','id'=>$contenido->id),array('class'=>'btn btn-primary'));
$this->padding       = 'no-padding';
$this->pageicon      = 'fa-keyboard-o';
?>

<?php

$this->widget(
    'booster.widgets.TbExtendedGridView',
    array(
        'fixedHeader' => true,
        //'headerOffset' => 40,
        // 40px is the height of the main navigation at bootstrap
        'type' => 'striped',
        'dataProvider' => $model->search(),
        'filter'=>$model,
        'responsiveTable' => true,
        'template' => "{items}",
        'columns'=>array(
            'id',
            array( 'name'=> 'contenido_adicional_posicion_id' ,'value'=>'$data->contenidoAdicionalPosicion->nombre'),
            //'contenido',
            array( 'name'=> 'contenido_adicional_tipo_id' ,'value'=>'$data->contenidoAdicionalTipo->nombre'),
            array(
                'htmlOptions' => array('nowrap'=>'nowrap'),
                'class'=>'booster.widgets.TbButtonColumn',
                'template'=>'{view} {update} {imagenes} {delete}',
                'buttons'=>array(

                    'view' => array
                    (
                        'options'=>array('title'=>'Ver Adicional'),
                        //'label'=>'<i class="fa fa-file-image-o"> </i>',
                        'url'=>'Yii::app()->createUrl("/contenido/viewAdicional", array("id"=>$data["id"]))',
                    ),
                    'update' => array
                    (
                        'options'=>array('title'=>'Editar Adicional'),
                        //'label'=>'<i class="fa fa-file-image-o"> </i>',
                        'url'=>'Yii::app()->createUrl("/contenido/updateAdicional", array("id"=>$data["id"]))',
                    ),
                    'imagenes' => array
                    (
                        'options'=>array('title'=>'Imagenes Adicional'),
                        'label'=>'<i class="fa fa-plus"> </i>',
                        'visible'=>'$data["contenido_adicional_tipo_id"]== 2',
                        'url'=>'Yii::app()->createUrl("/contenido/imagenAdicional", array("id"=>$data["id"]))',
                    ),
                    'delete' => array
                    (
                        'options'=>array('title'=>'Eliminar Adicional'),
                        //'label'=>'<i class="fa fa-file-image-oe"> </i>',
                        'url'=>'Yii::app()->createUrl("/contenido/deleteAdicional", array("id"=>$data["id"]))',
                    ),
                ),
                //'viewButtonUrl'=> 'Yii::app()->createUrl("/contenido/view", array("id"=>$data["id"]))',
                //'updateButtonUrl'=>'Yii::app()->createUrl("/contenido/update", array("id"=>$data["id"]))',
                //'deleteButtonUrl'=> 'Yii::app()->createUrl("/hotel/delete", array("id"=>$data["id"]))',
            )
        ),
    )
);

?>