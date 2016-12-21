<?php
$this->pageTitle=Yii::app()->name . ' - Registar Usuario';
$this->breadcrumbs=array(
	'Ingresar'=>array('site/ingresar'),'Registar Usuario'
);
?>

<div class="page-header" style="">
    <h1>
        Formulario Registro Usuario
    </h1>
</div>
<div id="interesado">
   <?php $this->renderPartial('_interesadoForm',array('model'=>$model)); ?> 
</div>
