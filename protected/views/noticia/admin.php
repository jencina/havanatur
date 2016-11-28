<?php
/* @var $this NoticiaController */
/* @var $model Noticia */

$this->breadcrumbs=array(
	'Noticias'=>array('index'),
	'Manage',
);
?>

<div class="page-header">
    <h1>Contenido <small>Administrador</small>
        <?php echo CHtml::link('Nuevo',array('noticia/create'),array('class'=>'btn btn-primary'));?>
    </h1>
</div>


<?php 
$this->widget(
    'booster.widgets.TbExtendedGridView',
    array(
        'fixedHeader' => true,
        'type' => 'striped',
        'dataProvider' => $model->search(),
        'filter'=>$model,
        'responsiveTable' => true,
        'template' => "{items} {pager}",
        'columns'=>array(
            'not_id',
            'not_titulo',
            'not_subtitulo',
            'not_contenido',
            'not_imagen',
            'not_fecha',
            array(
                'htmlOptions' => array('nowrap'=>'nowrap'),
                'class'=>'booster.widgets.TbButtonColumn',
                'template'=>'{view} {update} {delete}',
                'buttons'=>array(

                    'view' => array
                    (
                        'options'=>array('title'=>'Ver Noticia'),
                        //'label'=>'<i class="fa fa-file-image-o"> </i>',
                        'url'=>'Yii::app()->createUrl("/noticia/view", array("id"=>$data["not_id"]))',
                    ),
                    'update' => array
                    (
                        'options'=>array('title'=>'Editar Noticia'),
                         //'label'=>'<i class="fa fa-file-image-o"> </i>',
                        'url'=>'Yii::app()->createUrl("/noticia/update", array("id"=>$data["not_id"]))',
                    ),
                    'delete' => array
                    (
                        'options'=>array('title'=>'Eliminar Noticia'),
                        //'label'=>'<i class="fa fa-file-image-o"> </i>',
                        'url'=>'Yii::app()->createUrl("/noticia/delete", array("id"=>$data["not_id"]))',
                    ),
                ),
            )
        ),
    )
);

?>
