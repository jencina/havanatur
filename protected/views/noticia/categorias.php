<?php
    $this->breadcrumbs   = array('Noticias','Categoria'=>array('noticia/categorias'));
    $this->pagetitulo    = 'Categoria';
    $this->pagesubtitulo = 'Administrador';
    $this->btncreate     = CHtml::link('Nuevo',array('noticia/categoriaCreate'),array('class'=>'btn btn-primary'));
    $this->padding       = 'no-padding';
    $this->pageicon      = 'fa-file-text';
?>

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
                'template'=>'{update} {delete}',
                'buttons'=>array(

                    /*'view' => array
                    (
                        'options'=>array('title'=>'Ver Categoria'),
                        //'label'=>'<i class="fa fa-file-image-o"> </i>',
                        'url'=>'Yii::app()->createUrl("/noticia/categoriaView", array("id"=>$data["cat_id"]))',
                    ),*/
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
