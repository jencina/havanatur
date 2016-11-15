<?php

foreach($data->programaCombinacionVigencias as $vigencia){
    $this->renderPartial('_tarifa',array('vigencia'=>$vigencia,'data'=>$data));
}

?>
