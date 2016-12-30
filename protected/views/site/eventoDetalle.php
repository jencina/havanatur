<?php
    $this->breadcrumbs = array('Eventos Academicos','Eventos de '.$evento->evenCat->cat_nombre =>array('site/eventos','id'=>$evento->even_cat_id),$evento->even_titulo);
    $this->widthPageClass  = '';
    $this->headerTitulo    = $evento->even_titulo;
    $this->headerCategoria = $evento->evenCat->cat_nombre;
    $this->headerFecha     = ($evento->even_fecha == '0000-00-00')?date("F d,Y",strtotime($evento->even_fechacreacion)):date("F d,Y",strtotime($evento->even_fecha));
    $this->headerImagen    = $evento->even_imagen_detail;
?>

<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="font-size: 18px;color:#898989;padding: 20px 25px">
    <div class="col-md-12" style="text-align: justify">
        <?php echo $evento->even_contenido?>
    </div>
    
    <?php if(Yii::app()->user->isGuest):?>
    <div class="col-md-12 margin-top-10" style="margin-top: 20px">
        <div class="row btn-custom ">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 button-container " style="min-height: 80px;margin:0;padding: 0;">
                <div class="button-container">
                    <?php echo CHtml::link('Inscribir Evento',array('site/ingresar'),array('class'=>'cotizar'));?>
                </div>
            </div>
        </div>
    </div>
    <?php endif;?>
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
         <?php if(!empty($evento->even_telefono_2)):?>
        <li class="list-group-item"><span style="font-size: 17px"><i class="fa fa-phone-square"></i><?php echo $evento->even_telefono_2; ?></span></li>
        <?php endif;?>
        <li class="list-group-item">
            <span style="font-size: 17px">
                <i class="fa fa-file-pdf-o"></i>Evento :
                    <?php if(!empty($evento->even_pdf)):?>
                        <a class="" target="_blank" href="<?php echo Yii::app()->request->baseUrl.'/images/eventos/pdf/'.$evento->even_pdf; ?>">Descargar</a>
                    <?php endif;?>
            </span>
        </li>
    </ul>
    
    <div class="page-header-detail btn-success">
        <h4 style="margin-top:15px;">
            <i class="fa fa-info-circle"></i> Inscripciones
        </h4>
    </div>
    <ul class="include list-group">
        <li class="list-group-item">
            <span style="font-size: 17px"><i class="fa fa-users"></i>Usuarios Inscritos: <span id="contador" class="label label-primary"><?php echo EventoHasInteresado::model()->countByAttributes(array('evento_even_id'=>$evento->even_id)); ?></span></span>
        </li>
        <?php if(!Yii::app()->user->isGuest):?>
        <li class="list-group-item">
            <div class="row btn-custom ">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 button-container">
                    <div class="button-container">
                        <?php echo CHtml::link('Inscribir Evento',null,array('id'=>'btn-inscribir','class'=>'cotizar'));?>
                    </div>
                </div>
            </div>
        </li>
        <?php endif;?>
    </ul>
</div>

<script>
$("#btn-inscribir").on("click",function(){
    
    $.SmartMessageBox({
            title   : "Inscripcion Evento",
            content : 'Esta seguro que desea inscribirse en curso : <b>"<?php echo $evento->even_titulo;?>"',
            buttons : '[No][Si]'
    }, function(ButtonPressed) {
            if (ButtonPressed === "Si") {
                
                $.ajax({
                    url  : "<?php echo Yii::app()->createURL('user/inscribirEvento');?>",
                    type : 'post',
                    dataType: 'json',
                    data : {id:<?php echo $evento->even_id;?>},
                    beforeSend : function(){
                        $("#btn-int").button('loading');
                    },
                    success: function(data){
                        if(data.status=="success"){
                            $.bigBox({
                                title : "Inscripcion Evento",
                                content : 'Se ha realizado la inscripcion al evento "<?php echo $evento->even_titulo;?>" con exito!',
                                color : "#C79121",
                                icon : "fa fa-users fadeInLeft animated",
                            });
                            
                            $("#contador").html(data.count);
                    
                        }else if(data.status=="failed"){
                            $.bigBox({
                                title : "Error al Inscribir Evento",
                                content : '"'+data.msj+'"',
                                color : "#C46A69",
                                icon : "fa fa-warning shake animated",
                            });
                        }
                    },
                    complete:function(){
                         $("#btn-int").button('reset');
                    }
                }); 
            }
            if (ButtonPressed === "No") {
                return false;
            }
    });
    return false;   
});

</script>