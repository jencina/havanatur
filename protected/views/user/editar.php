<?php
$this->pageTitle=Yii::app()->name . ' - Editar Datos';
$this->breadcrumbs=array(
	'Perfil de Usuario'=>array('user/perfil'),'Editar Datos'
);
?>

<div class="row">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-desktop fa-pencil-square-o"></i>
            Editar Datos
        </h1>
    </div>
</div>

<div id="interesado">
   <?php $this->renderPartial('_interesadoForm', array('model'=>$model)); ?>
</div>


