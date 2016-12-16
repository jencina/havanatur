<?php
$this->breadcrumbs   = array('Condiciones'=>array('condiciones/admin'));
$this->pagetitulo    = 'Condiciones';
$this->pagesubtitulo = 'Administrador';
$this->btncreate     = CHtml::link('Nuevo',array('condiciones/create'),array('class'=>'btn btn-primary'));
$this->padding       = 'no-padding';
$this->pageicon      = 'fa-users';
?>

<?php
$this->widget(
    'booster.widgets.TbGridView',
    array(
        'type' => 'striped',
        'dataProvider' => $model->search(),
        'filter'=>$model,
        'template' => "{items} {pager}",
        'columns'=>array(
		'id',
		'contenido',
		array(
                'htmlOptions' => array('nowrap'=>'nowrap'),
                'class'=>'booster.widgets.TbButtonColumn',
                'template'=>'{view} {update} {delete}',

                'viewButtonUrl'=> 'Yii::app()->createUrl("/condiciones/view", array("id"=>$data["id"]))',
                'updateButtonUrl'=>'Yii::app()->createUrl("/condiciones/update", array("id"=>$data["id"]))',
                'deleteButtonUrl'=> 'Yii::app()->createUrl("/condiciones/delete", array("id"=>$data["id"]))',
            )
	),
)); ?>

<?php
/* $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'condiciones-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'contenido',
		array(
			'class'=>'CButtonColumn',
		),
	),
));*/ ?>
