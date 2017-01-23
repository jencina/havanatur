<?php
    $this->breadcrumbs   = array('Eventos'=>array('evento/admin'));
    $this->pagetitulo    = 'Eventos';
    $this->pagesubtitulo = 'Administrador';
    $this->btncreate     = CHtml::link('Nuevo',array('evento/create'),array('class'=>'btn btn-primary'));
    $this->padding       = 'no-padding';
    $this->pageicon      = ' fa-map-marker ';
?>

<?php 
$this->widget(
    'booster.widgets.TbExtendedGridView',
    array(
        'fixedHeader' => true,
        'type' => 'striped',
        'dataProvider' => $model->search(),
        //'filter'=>$model,
        'responsiveTable' => true,
        'template' => "{items} {pager}",
        'columns'=>array(
            'even_id',
            'even_titulo',
            'even_subtitulo',
           // 'even_contenido',
            'evenCat.cat_nombre',
            'even_imagen',
            'even_imagen_detail',
            array(
                'htmlOptions' => array('nowrap'=>'nowrap'),
                'class'=>'booster.widgets.TbButtonColumn',
                'template'=>'{view} {update} {delete}',
                'buttons'=>array(

                    'view' => array
                    (
                        'options'=>array('title'=>'Ver Evento'),
                        //'label'=>'<i class="fa fa-file-image-o"> </i>',
                        'url'=>'Yii::app()->createUrl("/evento/view", array("id"=>$data["even_id"]))',
                    ),
                    'update' => array
                    (
                        'options'=>array('title'=>'Editar Evento'),
                         //'label'=>'<i class="fa fa-file-image-o"> </i>',
                        'url'=>'Yii::app()->createUrl("/evento/update", array("id"=>$data["even_id"]))',
                    ),
                    'delete' => array
                    (
                        'options'=>array('title'=>'Eliminar Evento'),
                        //'label'=>'<i class="fa fa-file-image-o"> </i>',
                        'url'=>'Yii::app()->createUrl("/evento/delete", array("id"=>$data["even_id"]))',
                    ),
                ),
            )
        ),
    )
);

?>

