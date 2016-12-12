<?php
$this->breadcrumbs   = array('Usuarios'=>array('usuario/admin'));
$this->pagetitulo    = 'Usuarios';
$this->pagesubtitulo = 'Administrador';
$this->btncreate     = CHtml::link('Nuevo',array('usuario/create'),array('class'=>'btn btn-primary'));
$this->padding       = 'no-padding';
$this->pageicon      = 'fa-user';
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
            'apellido',
            'usuario',
            'contrasena',
            array('name'=>'usuario_tipo_id',
                'value'=>'$data->usuarioTipo->nombre'
            ),
            //'activo',
            array(
                'htmlOptions' => array('nowrap'=>'nowrap'),
                'class'=>'booster.widgets.TbButtonColumn',
                'viewButtonUrl'=> 'Yii::app()->createUrl("/usuario/view", array("id"=>$data["id"]))',
                'updateButtonUrl'=>'Yii::app()->createUrl("/usuario/update", array("id"=>$data["id"]))',
                'deleteButtonUrl'=> 'Yii::app()->createUrl("/usuario/delete", array("id"=>$data["id"]))',
            )
        ),
    )
);
?>