<section>
    <div>
        <?php $lightbox = Lightbox::model()->findAllByAttributes(array('activo'=>1));
        if(count($lightbox)>0):
            foreach($lightbox as $light):
                ?>
                <a style="display: none" id="link" href="<?php echo Yii::app()->request->baseUrl; ?>/images/lightbox/<?php echo $light->imagen?>" data-lightbox="<?php echo $light->imagen?>">Image #1</a>
                <!-- <a class="example-image-link" href="<?php echo Yii::app()->request->baseUrl; ?>/images/lightbox/<?php echo $light->imagen?>" data-lightbox="example-1"><img class="example-image" src="<?php echo Yii::app()->request->baseUrl; ?>/images/lightbox/<?php echo $light->imagen?>" alt="image-1" /></a>-->
                <script>
                    $(document).ready(function(){
                        $('#link').click();
                    });
                </script>
            <?php endforeach;endif; ?>
    </div>
</section>

<?php
$this->pageTitle=Yii::app()->name;
?>

<div id="carousel" class="carousel">
    <?php

    $this->widget(
        'booster.widgets.TbCarousel',
        array(
            'items' =>$carousel
        )
    );
    ?>
</div>

<div class="caracteristicas">
    <div class="col-md-4 first">
        <div>
            <!--<i class="fa fa-building"></i>-->
            <span>HOTELERIA</span>
        </div>
    </div>
    <div class="col-md-4 second">
        <div>
            <!-- <i class="fa fa-plane"></i> -->
            <span>VIAJES</span>
        </div>
    </div>
    <div class="col-md-4 thirt">
        <div>
           <!-- <i class="fa fa-info-circle"></i>-->
            INFORMACION
        </div>
    </div>
</div>

<div class="page-header">
    <h1>
        PRODUCTOS DESTACADOS
        <small></small>
    </h1>
</div>

<!-- THUMBNAIL -->

<div class="destacados">
    <div class="row">

        <?php foreach($programaDestacados as $programaDestacado):
           $imagen = $programaDestacado->getImagenDestacado();
            ?>
            <div class="col-xs-6 col-sm-4 col-md-3">
                <div class="thumbnail">
                    <div class="img" style="background-image: url('<?php echo Yii::app()->request->baseUrl; ?>/images/<?php echo $imagen;?>')"></div>
                    <div class="caption">
                        <a class="product-name"><?php echo $programaDestacado->nombre; ?></a>

                        <div class="product-description">
                            <?php echo $programaDestacado->descripcion; ?>
                        </div>

                        <div class="price">
                            <span class="new">$<?php echo $programaDestacado->precio_desde?></span>
                            <!-- <span class="old">$4000</span> -->
                        </div>

                        <div class="button-container">
                            <?php echo CHtml::link('<i class="fa fa-info"></i>',array('site/programa','id'=>$programaDestacado->id),array('class'=>'cotizar')); ?>
                            <!-- <a href="#" class="cotizar" role="button">
                                <i class="fa fa-shopping-cart"></i>
                            </a>-->
                            <!--
                            <a href="#" class="info" role="button">
                                <i class="fa fa-info"></i>
                            </a>-->
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>

    </div>
</div>

<div class="page-header">
    <h1>
       Asociados
        <small></small>
    </h1>
</div>

<div class="asociados">
    <?php

    $this->renderPartial('carouselAsociados');

    ?>
</div>
