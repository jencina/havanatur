<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.jcarousel-core.min.js"></script>

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
    <div id="myCarousel" class="jcarousel">
        <ul>
        <?php foreach($programaDestacados as $programaDestacado):
           $imagen = $programaDestacado->getImagenDestacado();
        ?>
            <li class="padding-10">
                <div class="thumbnail" style="padding:0">
                    <div class="img" style="background-image: url('<?php echo Yii::app()->request->baseUrl; ?>/images/<?php echo $imagen;?>')"></div>
                    <div class="caption">
                        <a class="product-name"><?php echo $programaDestacado->nombre; ?></a>

                        <div class="product-description">
                            <?php echo $programaDestacado->descripcion; ?>
                        </div>

                        <div class="price">
                            <span class="new"><span style="font-size:15px;">desde</span> $<?php echo $programaDestacado->precio_desde?></span>
                        </div>

                        <div class="button-container">
                            <?php echo CHtml::link('<i class="fa fa-info"></i>',array('site/programa','id'=>$programaDestacado->id),array('class'=>'cotizar')); ?>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach;?>
        </ul>
        <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
        <a href="#" class="jcarousel-control-next">&rsaquo;</a>
    </div>
</div>

<div class="page-header">
    <h1>
        Noticias
        <small></small>
    </h1>
</div>

<div class="noticias">
    <div id="myCarousel2" class="jcarousel">
        <ul>
            <?php
                foreach ($noticias as $noticia){
                    echo '<li class="padding-10">';
                        $this->renderPartial('noticiaDestacado',array('noticia'=>$noticia));
                    echo '</li>';
                }
            ?>
        </ul>
        <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
        <a href="#" class="jcarousel-control-next">&rsaquo;</a>
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
 $(function() {
        var jcarousel = $('.jcarousel');
        jcarousel.on('jcarousel:reload jcarousel:create', function () {
                var carousel = $(this),
                    width = carousel.innerWidth();

                if (width >= 600) {
                    width = width / 3;
                } else if (width >= 350) {
                    width = width / 2;
                }

                carousel.jcarousel('items').css('width', Math.ceil(width) + 'px');
            })
            .jcarousel({
                wrap: 'circular'
            });

        $('.jcarousel-control-prev')
            .jcarouselControl({
                target: '-=1'
            });

        $('.jcarousel-control-next')
            .jcarouselControl({
                target: '+=1'
            });

        $('.jcarousel-pagination')
            .on('jcarouselpagination:active', 'a', function() {
                $(this).addClass('active');
            })
            .on('jcarouselpagination:inactive', 'a', function() {
                $(this).removeClass('active');
            })
            .on('click', function(e) {
                e.preventDefault();
            })
            .jcarouselPagination({
                perPage: 1,
                item: function(page) {
                    return '<a href="#' + page + '">' + page + '</a>';
                }
            });
    });
</script>