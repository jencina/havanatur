<?php
$this->pageTitle=Yii::app()->name . ' - Editar Datos';
$this->breadcrumbs=array(
	'Perfil'=>array('user/perfil'),'Editar Datos'
);
?>

<div class="page-header" style="">
    <h1>
       Editar Datos
    </h1>
</div>
<div id="interesado">
   <?php $this->renderPartial('_interesadoForm', array('model'=>$model)); ?>
</div>


