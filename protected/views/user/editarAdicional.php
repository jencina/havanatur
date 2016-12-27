<?php
$this->pageTitle=Yii::app()->name . ' - Editar Datos';
$this->breadcrumbs=array(
	'Perfil'=>array('user/perfil'),'Editar Datos Adicional'
);
?>

<div class="page-header" style="">
    <h1>
       Editar Datos
    </h1>
</div>
<div id="interesado">
   <?php $this->renderPartial('_adicionalForm', array('model'=>$model)); ?>
</div>
