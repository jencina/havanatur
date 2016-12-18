<?php
    $this->breadcrumbs = array('Eventos Academicos','Eventos de '.$evento->evenCat->cat_nombre =>array('site/eventos','id'=>$evento->even_cat_id),$evento->even_titulo);
    $this->widthPageClass  = '';
    $this->headerTitulo    = $evento->even_titulo;
    $this->headerCategoria = $evento->evenCat->cat_nombre;
    $this->headerFecha     = ($evento->even_fecha == '0000-00-00')?date("F d,Y",strtotime($evento->even_fechacreacion)):date("F d,Y",strtotime($evento->even_fecha));
    $this->headerImagen    = $evento->even_imagen_detail;
?>

<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="font-size: 18px;color:#898989;padding: 20px 25px">
    
    <?php echo $evento->even_contenido?>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 button-container" style="min-height: 80px;margin:0;padding: 0;">
            <a class="biography-icon cotizar" onclick="js:$('.biography-ctn').toggle('slow');"><i class="fa fa-user"></i></a>
            
            <div id="interesado" class="biography-ctn" style="display:none;min-width: 100%"> 
                <?php echo $this->renderPartial('_interesadoForm',array('model'=>$model,'evento'=>$evento));?>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="font-size: 18px;color:#898989;padding: 20px 25px">
    <div class="page-header-detail">
        <h4 style="margin-top:15px;">
            <i class="fa fa-calendar"></i> Otros Eventos
        </h4>
    </div>
    <ul class="include list-group">
        <?php foreach($categorias as $cat){ ?>
            <li class="list-group-item">
                <?php echo CHtml::link('<span style="font-size: 17px;color:#898989;">Evento de '.$cat->cat_nombre.'</span>',array('site/eventos','id'=>$cat->cat_id));?> 
            </li>
        <?php } ?>
    </ul>
</div>

<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="font-size: 18px;color:#898989;padding: 20px 25px">
    <div class="page-header-detail btn-info">
        <h4 style="margin-top:15px;">
            <i class="fa fa-info-circle"></i> Consultas
        </h4>
    </div>
    <ul class="include list-group">
        <li class="list-group-item">
            <span style="font-size: 17px"><i class="fa fa-envelope"></i><?php echo $evento->even_email; ?></span>
        </li>
        <li class="list-group-item"><span style="font-size: 17px"><i class="fa fa-phone-square"></i><?php echo $evento->even_telefono_1; ?></span></li>
        <li class="list-group-item"><span style="font-size: 17px"><i class="fa fa-phone-square"></i><?php echo $evento->even_telefono_2; ?></span></li>
    </ul>
</div>





