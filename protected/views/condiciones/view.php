<?php
$this->breadcrumbs   = array('Condiciones'=>array('condiciones/admin'),'Detalle');
$this->pagetitulo    = 'Condiciones';
$this->pagesubtitulo = 'Detalle #'.$model->id;
//$this->btncreate     = CHtml::link('Nuevo',array('condiciones/create'),array('class'=>'btn btn-primary'));
//$this->padding       = 'no-padding';
$this->pageicon      = 'fa-users';
?>

<?php
$this->widget(
    'booster.widgets.TbDetailView',
    array(
        'data' => $model,
        'attributes'=>array(
            'id',
            'contenido'
            
        ),
    )
); ?>

<div class="form-actions col-md-12" >
        
        <?php echo CHtml::link('Volver',array('condiciones/admin'),array('class'=>'btn btn-danger')); ?>
    </div>

