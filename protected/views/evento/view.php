<?php
    $this->breadcrumbs   = array('Eventos'=>array('evento/admin'),'Detalle');
    $this->pagetitulo    = 'Eventos';
    $this->pagesubtitulo = 'Detalle';
    //$this->btncreate     = CHtml::link('Nuevo',array('evento/create'),array('class'=>'btn btn-primary'));
    //$this->padding       = 'no-padding';
    $this->pageicon      = 'fa-map-marker ';
?>

<?php
$this->widget(
    'booster.widgets.TbDetailView',
    array(
        'data' => $model,
        'attributes'=>array(
           'even_id',
            'even_titulo',
            'even_subtitulo',
            'even_contenido',
            'even_imagen',
            'even_imagen_detail',
            'even_fecha',
            'even_fechacreacion',
            'even_fechamodificacion',
            'even_destacado',
            'even_activo',
            'usuario_id',
            'even_email',
            'even_telefono_1',
            'even_telefono_2',
            'even_cat_id',
        ),
    )
); ?>
