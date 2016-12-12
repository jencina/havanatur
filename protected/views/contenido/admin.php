<?php
$this->breadcrumbs   = array('Contenido'=>array('contenido/admin'));
$this->pagetitulo    = 'Contenido';
$this->pagesubtitulo = 'Administrador';
$this->btncreate     = CHtml::link('Nuevo',array('contenido/create'),array('class'=>'btn btn-primary'));
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
        'template' => "{items} {pager}",
        'columns'=>array(
            'id',
            'titulo',
            //'contenido',
            array( 'name'=> 'contenido_tipo_id' ,'value'=>'$data->contenidoTipo->nombre'),
            array(
                'htmlOptions' => array('nowrap'=>'nowrap'),
                'class'=>'booster.widgets.TbButtonColumn',
                'template'=>'{view} {update} {adicional} {delete}',
                'buttons'=>array(

                    'view' => array
                    (
                        'options'=>array('title'=>'Ver Contenido'),
                        //'label'=>'<i class="fa fa-file-image-o"> </i>',
                        'url'=>'Yii::app()->createUrl("/contenido/view", array("id"=>$data["id"]))',
                    ),
                    'update' => array
                    (
                        'options'=>array('title'=>'Editar Contenido'),
                         //'label'=>'<i class="fa fa-file-image-o"> </i>',
                        'url'=>'Yii::app()->createUrl("/contenido/update", array("id"=>$data["id"]))',
                    ),
                    'adicional' => array
                    (
                        'options'=>array('title'=>'Contenido Adicional'),
                        'label'=>'<i class="fa fa-plus"> </i>',
                        'url'=>'Yii::app()->createUrl("/contenido/adicional", array("id"=>$data["id"]))',
                    ),
                    'delete' => array
                    (
                        'options'=>array('title'=>'Eliminar Contenido'),
                        //'label'=>'<i class="fa fa-file-image-o"> </i>',
                        'url'=>'Yii::app()->createUrl("/contenido/delete", array("id"=>$data["id"]))',
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
