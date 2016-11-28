<?php
/* @var $this NoticiaController */
/* @var $model Noticia */

$this->breadcrumbs=array(
	'Categoria'=>array('index'),
	'Manage',
);
?>

<div class="page-header">
    <h1>Contenido <small>Administrador</small>
        <?php echo CHtml::link('Nuevo',array('noticia/categoriaCreate'),array('class'=>'btn btn-primary'));?>
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
            'cat_id',
            'cat_nombre',
            array(
                'htmlOptions' => array('nowrap'=>'nowrap'),
                'class'=>'booster.widgets.TbButtonColumn',
                'template'=>'{view} {update} {delete}',
                'buttons'=>array(

                    'view' => array
                    (
                        'options'=>array('title'=>'Ver Categoria'),
                        //'label'=>'<i class="fa fa-file-image-o"> </i>',
                        'url'=>'Yii::app()->createUrl("/noticia/categoriaView", array("id"=>$data["cat_id"]))',
                    ),
                    'update' => array
                    (
                        'options'=>array('title'=>'Editar Categoria'),
                         //'label'=>'<i class="fa fa-file-image-o"> </i>',
                        'url'=>'Yii::app()->createUrl("/noticia/categoriaUpdate", array("id"=>$data["cat_id"]))',
                    ),
                    'delete' => array
                    (
                        'options'=>array('title'=>'Eliminar Categoria'),
                        //'label'=>'<i class="fa fa-file-image-o"> </i>',
                        'url'=>'Yii::app()->createUrl("/noticia/categoriaDelete", array("id"=>$data["cat_id"]))',
                    ),
                ),
            )
        ),
    )
);

?>
