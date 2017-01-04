<?php

$this->breadcrumbs = array('Ingresar'=>array('site/ingresar'),'Activacion');

?>

<div class="row">
    <div class="col-md-12">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-desktop fa-user"></i>
           Activación cuenta de usuario
        </h1>
    </div>
</div>

<div class="row">
   <div class="alert alert-<?php echo  ($status == "success")?"success":"danger";?>" role="alert">
    <strong>Activacion</strong>
     <?php echo $msj?>
    </div>
</div>

