
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
        'content' => $this->renderPartial('application.views.programa.pdf.tarifaPdf',array('data'=>$data),true),
    )
);
?>
