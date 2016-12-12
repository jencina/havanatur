<?php
    $this->breadcrumbs   = array('Usuarios'=>array('usuario/admin'),'Detalle');
    $this->pagetitulo    = 'Usuarios';
    $this->pagesubtitulo = 'Detalle #'.$model->id;
    $this->pageicon      = 'fa-user';
?>

<?php
$this->widget(
    'booster.widgets.TbDetailView',
    array(
        'data' => $model,
        'attributes'=>array(
            'id',
            'nombre',
            'apellido',
            'usuario',
            'contrasena',
            array(
                'label' => 'Tipo Usuario',
                'value' => (isset($model->usuarioTipo->nombre))?$model->usuarioTipo->nombre:''
            ),
            'fecha_creacion',
            'fecha_modificacion',

        ),
    )
); ?>
