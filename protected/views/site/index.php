<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.jcarousel-core.min.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/slick/slick.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/slick/slick.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/slick/slick-theme.css">

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
    <div id="myCarousel" class="myCarousel slick">
        <?php foreach($programaDestacados as $programaDestacado):
           $imagen = $programaDestacado->getImagenDestacado();
        ?>
            <li class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="thumbnail" style="padding:0;">
                    <!-- class img--><div class="related-news-ctn" style="background-image: url('<?php echo Yii::app()->request->baseUrl; ?>/images/<?php echo $imagen;?>')"></div>
                    <div class="caption">
                        <a class="product-name"><?php echo $programaDestacado->nombre; ?></a>

                        <div class="product-description">
                            <?php echo $programaDestacado->descripcion; ?>
                        </div>

                        <div class="button-container">
                            <?php echo CHtml::link('<i class="fa fa-info"></i>',array('site/programa','id'=>$programaDestacado->id),array('class'=>'cotizar')); ?>
                          <div class="price">
                            <span class="new"><span style="font-size:15px;">desde</span> $<?php echo $programaDestacado->precio_desde?></span>
                        </div>
                        </div>
                    </div>
                </div>
           </li>
        <?php endforeach;?>
    </div>
</div>

<div class="page-header">
    <h1>
        Noticias
        <small></small>
    </h1>
</div>

<div class="noticias">
    <div id="myCarousel2" class="myCarousel slick">
            <?php
                foreach ($noticias as $noticia){
                        $this->renderPartial('noticiaDestacado',array('noticia'=>$noticia));
                }
            ?>
    </div>
</div>

<div class="page-header">
    <h1>
        Eventos
        <small></small>
    </h1>
</div>

<div class="noticias">
    <div id="myCarousel2" class="myCarousel slick">
            <?php
                foreach ($eventos as $evento){
                        $this->renderPartial('eventoDestacado',array('evento'=>$evento));
                }
            ?>
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



<script>
    $(document).ready(function(){
        $('.slick').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        prevArrow:'<button type="button" class="btn-prev btn-carousel"><i class="fa fa-arrow-left"></i></button>',
        nextArrow:'<button type="button" class="btn-next btn-carousel"><i class="fa fa-arrow-right"></i></button>',
        responsive: [
                {
                  breakpoint: 1000,
                  settings: {
                    slidesToShow:2
                  }
                },
                {
                  breakpoint: 710,
                  settings: {
                    slidesToShow: 1
                  }
                }
              ]
      });
    });
</script>