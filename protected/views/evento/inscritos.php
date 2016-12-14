<?php
    $this->breadcrumbs   = array('Eventos','Inscritos');
    $this->pagetitulo    = 'Inscritos';
    $this->pagesubtitulo = 'Administrador';
    //$this->btncreate     = CHtml::link('Nuevo',array('evento/categoriaCreate'),array('class'=>'btn btn-primary'));
    $this->padding       = 'no-padding';
    $this->pageicon      = 'fa-users';
?>

<?php 
$this->widget(
    'booster.widgets.TbExtendedGridView',
    array(
        'fixedHeader' => true,
        'type' => 'striped',
        'dataProvider' => $dataProvider,
        //'filter'=>$model,
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

