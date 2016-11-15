
<?php

$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'homeLink' => CHtml::link('Home',array('site/index')),
        //'links' => array($model->nombre)
		 'links' => array($model->programaTipo->nombre,$model->nombre)
    )
);

?>


<div class="page-header-detail">
    <h1>
        <?php echo strtoupper($model->nombre);?>
        <?php if(!empty($model->pdf)):?>
        <a class="download-pdf" target="_blank" href="<?php echo Yii::app()->request->baseUrl.'/images/pdf/'.$model->pdf; ?>"><i class="fa fa-file-pdf-o"></i></a>
        <?php endif;?>
    </h1>
</div>

<div class="page-detail-description col-md-12">
    <div class="col-md-3">
        <?php echo $model->descripcion ?>
    </div>

    <div class="col-md-9">
        <div class="carousel">
            <?php
            if(count($imagenes)>0){
                $this->widget(
                    'booster.widgets.TbCarousel',
                    array(
                        'items' => $imagenes,
                    )
                );
            }else{?>
                <img style="width:100%;height: 370px" src="<?php echo Yii::app()->request->baseUrl;?>/images/error/image-not-found.png"/>
            <?php } ?>
        </div>
    </div>
</div>


<div id="programa-contenido" class="page-detail-content col-md-12">

    <div class="col-md-4">
        <div class="page-header-detail btn-success">
            <h3>
                INCLUYE
            </h3>
        </div>

        <ul class="include list-group">
            <?php foreach($model->programaIncluyes as $incluye):?>
                <li class="list-group-item list-group-item-success"><i class="fa fa-check-square-o"></i><?php echo $incluye->nombre?></li>
            <?php endforeach; ?>
        </ul>

        <div class="page-header-detail btn-danger">
            <h3>
                NO INCLUYE
            </h3>
        </div>

        <ul class="include list-group">
            <?php foreach($model->programaNoIncluyes as $incluye):?>
                <li class="list-group-item list-group-item-danger"><i class="fa fa-minus-square"></i><?php echo $incluye->nombre?></li>
            <?php endforeach; ?>
        </ul>

        <div class="page-header-detail btn-info">
            <h3>
                SUPLEMENTO AEREO
            </h3>
        </div>

        <ul class="include list-group">
            <?php foreach($model->programaSuplementoAereos as $incluye):?>
                <li class="list-group-item list-group-item-info"><i class="fa fa-plane"></i><?php echo 'CLASE '.$incluye->clase.' USD '.$incluye->usd?></li>
            <?php endforeach; ?>
        </ul>
		
		<div class="page-header-detail btn-warning">
            <h3>
                CONDICIONES GENERALES
            </h3>
        </div>

        <ul class="include list-group">
            <?php foreach($condiciones as $incluye):?>
                <li class="list-group-item list-group-item-warning"><i class="fa fa-info"></i><?php echo $incluye->contenido?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div id="combinaciones" class="col-sx-12 col-sm-12 col-md-8" style="">
        <div class="page-header-detail">
            <h3>
                COMBINACIONES
            </h3>
        </div>

        <div class="page-detail-combi col-md-12">

            <?php

            $this->widget(
                'booster.widgets.TbThumbnails',
                array(
                    'id'=>'datos',
                    'dataProvider' => $combi,
                    'template' => "{items}\n{pager}",
                    'itemView' => '_programa',
                )
            );
            ?>
        </div>
    </div>
	
</div>

<!-- MODAL COTIZACION -->
<?php $this->beginWidget(
    'booster.widgets.TbModal',
    array('id' => 'modalCotizar')
); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>COTIZAR PROGRAMA</h4>
</div>

<div class="modal-body"></div>


<?php $this->endWidget(); ?>


<script>

    function cotizar(id){

        $.ajax({
            url  : "<?php echo Yii::app()->createURL('site/cotizar');?>",
            type : 'post',
            cache: false ,
            data : {id:id},
            beforeSend : function(){
                $("#modalCotizar").modal("show");
            },
            success: function(data){
                    $("#modalCotizar .modal-body").html(data.div);
            }
        });

        return false;
    }
    function getCombinacion(id){
        if($('#collapse'+id).is(':visible') == true){
             $('#collapse'+id).collapse('hide');
        }else{
            $.ajax({
                url  : "<?php echo Yii::app()->createURL('site/getCombinacion');?>",
                type : 'post',
                cache: false ,
                data : {id:id},
                beforeSend : function(){
					$('#collapse'+id).before('<div id="cargando" style="text-align:center;color:#bababa;font-size:15px;padding:5px;" class="col-md-12"><i class="fa fa-circle-o-notch fa-spin fa-fw"></i> Cargando...</div>');
                },
                success: function(data){
                    $('#collapse'+id).html(data.data);
                },
                complete:function(){
					$("#cargando").remove();
                    $('#collapse'+id).collapse('show');
                }
            });

            return false;
        }

    }

    </script>