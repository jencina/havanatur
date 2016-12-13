<?php
$this->breadcrumbs   = array('Programa'=>array('programa/admin'));
$this->pagetitulo    = 'Programa';
$this->pagesubtitulo = 'Administrador';
$this->btncreate     = CHtml::link('Nuevo',array('programa/create'),array('class'=>'btn btn-primary'));
$this->padding       = 'no-padding';
$this->pageicon      = 'fa-plane';
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
            'nombre',

            'precio_desde',
            //array( 'name'=>'descripcion', 'type'=>'raw' ),
            array( 'name'=> 'programa_tipo_id' ,'value'=>'$data->programaTipo->nombre'),
			'activo',
            'orden',
            array(
                'htmlOptions' => array('nowrap'=>'nowrap'),
                'class'=>'booster.widgets.TbButtonColumn',
                'template'=>'{pdf} {caracteristicas} {imagenes} {combinaciones} {view} {update} {delete}',
                'buttons'=>array(
                    'pdf' => array
                    (
                        'options'=>array('title'=>'PDF'),
                        'label'=>'<i class="fa fa-file-image-o"> </i>',
                        'url'=>'Yii::app()->createUrl("programa/generatePdf", array("id"=>$data->id))',
                    ),
                    'imagenes' => array
                    (
                        'options'=>array('title'=>'Fotos Programa'),
                        'label'=>'<i class="fa fa-file-image-o"> </i>',
                        'url'=>'Yii::app()->createUrl("programa/fotos", array("id"=>$data->id))',
                    ),
                    'caracteristicas' => array
                    (
                        'options'=>array('title'=>'Caracteristicas Programa'),
                        'label'=>'<i class="fa fa-plus-square"></i>',
                        'url'=>'Yii::app()->createUrl("programa/caracteristicas", array("id"=>$data->id))',
                    ),
                    'combinaciones' => array
                    (
                        'options'=>array('title'=>'Combinaciones'),
                        'label'=>'<i class="fa fa-sitemap"></i>',
                        'url'=>'Yii::app()->createUrl("programa/combinaciones", array("id"=>$data->id))',
                    ),
                ),
                'viewButtonUrl'=> 'Yii::app()->createUrl("/programa/view", array("id"=>$data["id"]))',
                'updateButtonUrl'=>'Yii::app()->createUrl("/programa/update", array("id"=>$data["id"]))',
                'deleteButtonUrl'=> 'Yii::app()->createUrl("/programa/delete", array("id"=>$data["id"]))',
            )
        ),
    )
);
?>