

<div class="col-md-12" style="background-color: #ffffff;border-left: 1px solid #ddd;border-right: 1px solid #ddd;border-bottom: 1px solid #ddd">


    <div class="carousel">
        <?php
        $imagenes = array();
        foreach($hotel->hotelImagens as $imagen){
         $imagenes[] = array(
             //'image' => Yii::app()->request->baseUrl.'/images/hotel/'.$imagen->imagen,
			 'div' => '<div style="height:370px;background-image: url('."'".Yii::app()->request->baseUrl.'/images/hotel/'.$imagen->imagen."'".')"></div>',
         );
        }

        if(count($imagenes)>0){
            $this->widget(
                'booster.widgets.TbCarousel',
                array(
                    'id'=>'carousel'.$id.'-'.$hotel->id,
                    'items' => $imagenes,
                )
            );
        }else{?>
            <img style="width: 100%;height: 300px" src="<?php echo Yii::app()->request->baseUrl;?>/images/error/image-not-found.png"/>
        <?php } ?>

    </div>

    <div id="callout-progress-animation-css3" class="bs-callout bs-callout-danger">
        <h4>
            <div class="star">
                <?php for($i = 1;$i<=5;$i++):?>
                    <i class="fa fa-star <?php echo ($i<=$hotel->estrellas)?'select':''?>"></i>
                <?php endfor;?>
            </div>
            <div class="ubicacion">
                <?php if(!empty($hotel->mapa)){ ?>
                    <a onclick="$('#modalMapa<?php echo $hotel->id?>').modal('show');">mapa</a>

                    <?php $this->beginWidget(
                        'booster.widgets.TbModal',
                        array('id' => 'modalMapa'.$hotel->id)
                    ); ?>

                    <div class="modal-header">
                        <a class="close" data-dismiss="modal">&times;</a>
                        <h4>MAPA <?php echo $hotel->nombre?></h4>
                    </div>


                    <iframe src="<?php echo $hotel->mapa?>" style="width: 100%;height: 350px"></iframe>


                    <?php $this->endWidget(); ?>
                <?php }?>
            </div>
        </h4>
        <p><?php echo $hotel->descripcion;?></p>
    </div>

    <div>
       <!-- <iframe src="https://www.google.com/maps/d/embed?mid=zBu-Zuo0ufsY.kGwk8TzXTaT0" width="640" height="480"></iframe> -->
    </div>
</div>
