<?php
/* @var $this NoticiaController */
/* @var $model Noticia */

$this->breadcrumbs=array(
	'Eventos'=>array('index'),
	'Manage',
);
?>

<div class="page-header">
    <h1>Inscritos Eventos <small>Administrador</small>
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
            'int_id',
            'int_nombre',
            'int_apellido',
            'int_email',
            'int_telefono',
            'int_celular',
            'int_rut',
            'int_fechacreacion',
            'intEven.even_titulo'
        ),
    )
);

?>

