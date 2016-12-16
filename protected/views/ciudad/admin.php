<?php
    $this->breadcrumbs   = array('Ciudad'=>array('Ciudad/admin'));
    $this->pagetitulo    = 'Ciudad';
    $this->pagesubtitulo = 'Administrador';
    $this->btncreate     = CHtml::link('Nuevo',array('Ciudad/create'),array('class'=>'btn btn-primary'));
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
            'nombre',
            'codigo',
            array(
                'htmlOptions' => array('nowrap'=>'nowrap'),
                'class'=>'booster.widgets.TbButtonColumn',
                'viewButtonUrl'=> 'Yii::app()->createUrl("/ciudad/view", array("id"=>$data["id"]))',
                'updateButtonUrl'=>'Yii::app()->createUrl("/ciudad/update", array("id"=>$data["id"]))',
                'deleteButtonUrl'=> 'Yii::app()->createUrl("/ciudad/delete", array("id"=>$data["id"]))',
            )
        ),
    )
);
?>

