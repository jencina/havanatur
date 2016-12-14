<?php
    $this->breadcrumbs   = array('Cotizaciones');
    $this->pagetitulo    = 'Cotizaciones';
    $this->pagesubtitulo = 'lista';
    //$this->btncreate     = CHtml::link('Nuevo',array('evento/categoriaCreate'),array('class'=>'btn btn-primary'));
    //$this->padding       = 'no-padding';
    $this->pageicon      = 'fa-money';
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
