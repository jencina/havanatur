<?php
    $this->breadcrumbs   = array('Ciudad'=>array('Ciudad/admin'),'Detalle');
    $this->pagetitulo    = 'Ciudad';
    $this->pagesubtitulo = 'Detalle #'.$model->id;
    //$this->btncreate   = CHtml::link('Nuevo',array('Ciudad/create'),array('class'=>'btn btn-primary'));
    //$this->padding     = 'no-padding';
    $this->pageicon      = 'fa-users';
?>

<?php
$this->widget(
    'booster.widgets.TbDetailView',
    array(
        'data' => $model,
        'attributes'=>array(
            'id',
            'nombre',
            'codigo',
        ),
    )
); ?>

<div class="form-actions col-md-12" >
    <?php echo CHtml::link('Volver',array('ciudad/admin'),array('class'=>'btn btn-danger')); ?>
</div>