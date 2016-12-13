<?php
    $this->breadcrumbs   = array('Noticias'=>array('Noticia/admin'),$model->not_id=>array('view','id'=>$model->not_id),'Detalle');
    $this->pagetitulo    = 'Noticia';
    $this->pagesubtitulo = 'Detalle';
    //$this->btncreate     = CHtml::link('Nuevo',array('Noticia/create'),array('class'=>'btn btn-primary'));
    //$this->padding       = 'no-padding';
    $this->pageicon      = 'fa-file-text';
?>


<?php
$this->widget(
    'booster.widgets.TbDetailView',
    array(
        'data' => $model,
        'attributes'=>array(
           'not_id',
		'not_titulo',
		'not_subtitulo',
		'not_contenido',
		'not_imagen',
		'not_fecha',
		'not_fechacreacion',
		'not_fechamodificacion',
		'usuario_id',
        ),
    )
); ?>

