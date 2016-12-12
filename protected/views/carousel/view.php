<?php
$this->breadcrumbs   = array('Carrusel'=>array('carousel/admin'),'Detalle');
$this->pagetitulo    = 'Carrusel';
$this->pagesubtitulo = 'Detalle #'.$model->id;
//$this->btncreate     = CHtml::link('Nuevo',array('carousel/create'),array('class'=>'btn btn-primary'));
//$this->padding       = 'no-padding';
$this->pageicon      = 'fa-picture-o';
?>

<div class="col-md-12">
    <img style="width: 100%" src="<?php echo Yii::app()->request->baseUrl.'/images/carousel/'.$model->foto;?>" />
</div>

<?php
$this->widget(
    'booster.widgets.TbDetailView',
    array(
        'data' => $model,
        'attributes'=>array(
            'id',
            'foto',
            'orden',
            'descripcion',
            'titulo',
            'activo',
            array(
                'label' => 'Usuario',
                'value' => (isset($model->usuario->nombre))?$model->usuario->nombre:''
            ),
            'fecha_creacion',
            'fecha_modificacion',

        ),
    )
); ?>