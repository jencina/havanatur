<?php
$this->breadcrumbs   = array('Equipo'=>array('equipo/admin'),'Detalle #'.$model->id);
$this->pagetitulo    = 'Equipo';
$this->pagesubtitulo = 'Detalle #'.$model->id;
//$this->btncreate     = CHtml::link('Nuevo',array('equipo/create'),array('class'=>'btn btn-primary'));
//$this->padding       = 'no-padding';
$this->pageicon      = 'fa-users';
?>

<div class="col-md-12">
    <div class="col-sm-4 col-md-9">
    <?php
    $this->widget(
        'booster.widgets.TbDetailView',
        array(
            'data' => $model,
            'attributes'=>array(
                'id',
                'cargo',
                'nombre',
                'email',
                'anexo',
            ),
        )
    ); ?>
        </div>
    <div class="col-sm-4 col-md-3">
        <div class="thumbnail">
            <img style="width: 100%" src="<?php echo Yii::app()->request->baseUrl.'/images/equipo/'.$model->foto;?>" />
        </div>
    </div>

</div>




