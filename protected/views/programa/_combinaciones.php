
<?php
$hoteles = array();
foreach($data->hotels as $hotel){
    $hoteles[] = $hotel->nombre;
}

    $this->widget(
        'booster.widgets.TbPanel',
        array(
            'id'=>'panel'.$data->id,
            'title' => implode('+',$hoteles),
            'headerIcon' => 'home',
            'content' => $this->renderPartial('tarifa',array('data'=>$data),true),
            //'content' => 'asd',
            'headerButtons' => array(
                array(
                    'class' => 'booster.widgets.TbButtonGroup',
                    'type' => 'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'buttons' => array(
                        array('label' => 'Tarifas', 'url' => '','htmlOptions'=>array('onclick'=>'createTarifas('.$data->id.')')), // this makes it split :)
						array('label' => 'Editar', 'url' => array('programa/editCombinacion','id'=>$data->id)),
                        array('label' => 'Eliminar', 'url' => '','htmlOptions'=>array('onclick'=>'eliminarCombinacion('.$data->id.')'))
                    )
                ),
            )
        )
    );
?>





