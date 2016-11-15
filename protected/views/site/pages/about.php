
<?php

$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'homeLink' => 'PROGRAMA',
        'links' => array('')
    )
);

?>


<div class="page-header-detail">
    <h1>
        HAVANA VARADERO
    </h1>
</div>

<div class="page-detail-description col-md-12">
    <div class="col-md-3">
        Lorem ipsum dolor sit amet, invidunt explicari reprehendunt sit id. Aeterno contentiones ad sed. Dolor fuisset ne his, graeco quodsi et vel. Per impetus alienum at, ius ne ferri nonumy theophrastus.
        Explicari sadipscing qui ne, ut eros senserit mel, impetus phaedrum eu has. In dolorum apeirian splendide vis, cu est fuisset suscipit sensibus, ei vim nostrud fastidii.
        Novum elitr meliore eam ut, ex feugiat lobortis repudiare qui. Quaestio percipitur scribentur duo an, mel lorem senserit convenire at, mei ea habemus sapientem.
        An nec deleniti placerat perfecto, et vel iudico gloriatur.

    </div>

    <div class="col-md-9">
        <div class="carousel">
            <?php

            $this->widget(
                'booster.widgets.TbCarousel',
                array(
                    'items' => array(
                        array(
                            'image' => Yii::app()->request->baseUrl.'/images/carousel/slide-1.jpg',
                        ),
                        array(
                            'image' => Yii::app()->request->baseUrl.'/images/carousel/slide-2.jpg',
                        ),
                        array(
                            'image' => Yii::app()->request->baseUrl.'/images/carousel/slide-3.jpg',
                        ),
                    ),
                )
            );
            ?>
        </div>
    </div>
</div>


<div class="page-detail-content col-md-12">
<div class="col-md-3">
    <div class="page-header-detail btn-success">
        <h3>
            INCLUYE
        </h3>
    </div>

    <ul class="include list-group">
        <?php for($i=1;$i<5;$i++):?>
            <li class="list-group-item list-group-item-success"><i class="fa fa-check-square-o"></i>Lorem ipsum dolor sit amet</li>
        <?php endfor; ?>
    </ul>

    <div class="page-header-detail btn-danger">
        <h3>
            NO INCLUYE
        </h3>
    </div>

    <ul class="include list-group">
        <?php for($i=1;$i<5;$i++):?>
            <li class="list-group-item list-group-item-danger"><i class="fa fa-minus-square"></i>Lorem ipsum dolor sit amet</li>
        <?php endfor; ?>
    </ul>

    <div class="page-header-detail btn-info">
        <h3>
            SUPLEMENTO AEREO
        </h3>
    </div>

    <ul class="include list-group">
        <?php for($i=1;$i<5;$i++):?>
            <li class="list-group-item list-group-item-info"><i class="fa fa-plane"></i>Clase W usd 63</li>
        <?php endfor; ?>
    </ul>



</div>
<div class="col-md-9" style="padding-left: 20px!important;">
<div class="page-header-detail">
    <h3>
        COMBINACIONES
    </h3>
</div>

<div class="page-detail-combi">

    <?php for($i=1;$i<5;$i++):?>
    <div class="combi col-md-12">
        <div class="combi-image col-md-4">
            <img src="<?php echo Yii::app()->request->baseUrl;?>/images/destacados/<?php echo $i?>.png" style="max-width: 100%">
        </div>

        <div class="combi-content col-md-8 description">
            <h4>MEMORIES MONTEHABANA - PUNTA ARENAS</h4>
            <div>
                <p>Our planet is something unbelievable. It is so diverse and beautiful, so unique and controversial.
                    Earth is worth our admiring. The easiest way to explore all wonders and unique places of our planet is travelling.
                    It is very romantic and it takes one's breath away because new emotions are always unforgettable.
                    Just imagine yourself standing on the top of the waterfall or sitting among the tropical...</p>
            </div>

            <div class="price">
                <span class="new">$3000</span>
                <span class="old">$4000</span>
            </div>

            <div class="button-container col-md-12">
                <a href="#" class="cotizar" role="button" >
                    <i class="fa fa-shopping-cart"></i>
                </a>
                <a class="info" role="button" data-toggle="collapse" href="#collapseExample<?php echo $i?>" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa fa-info"></i>
                </a>
            </div>

        </div>

        <div  id="collapseExample<?php echo $i?>" class="col-md-12 page-detail-description collapse">

            <div class="col-md-6">
                <h4>MEMORIES MONTEHABANA</h4>
                <div class="star">
                    <i class="fa fa-star select"></i>
                    <i class="fa fa-star select"></i>
                    <i class="fa fa-star select"></i>
                    <i class="fa fa-star select"></i>
                    <i class="fa fa-star"></i>
                </div>
                <div class="carousel">
                    <?php

                    $this->widget(
                        'booster.widgets.TbCarousel',
                        array(
                            'items' => array(
                                array(
                                    'image' => Yii::app()->request->baseUrl.'/images/carousel/slide-1.jpg',
                                ),
                                array(
                                    'image' => Yii::app()->request->baseUrl.'/images/carousel/slide-2.jpg',
                                ),
                                array(
                                    'image' => Yii::app()->request->baseUrl.'/images/carousel/slide-3.jpg',
                                ),
                            ),
                        )
                    );
                    ?>
                </div>

                <div id="callout-progress-animation-css3" class="bs-callout bs-callout-danger">
                    <h4>Descripcion</h4>
                    <p>Progress bars use CSS3 transitions and animations to achieve some of their effects. These features are not supported in Internet Explorer 9 and below or older versions of Firefox. Opera 12 does not support animations.</p>
                </div>
                <div>
                    <?php
                    Yii::import('application.extensions.EGMAP.*');
                    $gMap = new EGMap();
                    $gMap->setJsName('test_map');
                    $gMap->width = '100%';
                    $gMap->height = 300;
                    $gMap->zoom = 11;
                    $gMap->setCenter(39.737827146489174, 3.2830574338912477);

                    $info_box = new EGMapInfoBox('<div style="color:#fff;border: 1px solid black; margin-top: 8px; background: #000; padding: 5px;">I am a marker with info box!</div>');

                    $info_box->pixelOffset = new EGMapSize('0','-140');
                    $info_box->maxWidth = 0;
                    $info_box->boxStyle = array(
                        'width'=>'"280px"',
                        'height'=>'"120px"',
                        'background'=>'"url(http://google-maps-utility-library-v3.googlecode.com/svn/tags/infobox/1.1.9/examples/tipbox.gif) no-repeat"'
                    );
                    $info_box->closeBoxMargin = '"10px 2px 2px 2px"';
                    $info_box->infoBoxClearance = new EGMapSize(1,1);
                    $info_box->enableEventPropagation ='"floatPane"';

                    $marker = new EGMapMarker(39.721089311812094, 2.91165944519042, array('title' => 'Marker With Info Box'));

                    $marker->addHtmlInfoBox($info_box);

                    $gMap->addMarker($marker);

                    $gMap->renderMap();
                    ?>
                </div>

                <div>
                    <div>
                        <div>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <h4>PUNTA ARENAS</h4>
                        <div class="star">
                            <i class="fa fa-star select"></i>
                            <i class="fa fa-star select"></i>
                            <i class="fa fa-star select"></i>
                            <i class="fa fa-star select"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="carousel">
                            <?php

                            $this->widget(
                                'booster.widgets.TbCarousel',
                                array(
                                    'items' => array(
                                        array(
                                            'image' => Yii::app()->request->baseUrl.'/images/carousel/slide-1.jpg',
                                        ),
                                        array(
                                            'image' => Yii::app()->request->baseUrl.'/images/carousel/slide-2.jpg',
                                        ),
                                        array(
                                            'image' => Yii::app()->request->baseUrl.'/images/carousel/slide-3.jpg',
                                        ),
                                    ),
                                )
                            );
                            ?>
                        </div>

                        <div id="callout-progress-animation-css3" class="bs-callout bs-callout-danger">
                            <h4>Descripcion</h4>
                            <p>Progress bars use CSS3 transitions and animations to achieve some of their effects. These features are not supported in Internet Explorer 9 and below or older versions of Firefox. Opera 12 does not support animations.</p>
                        </div>

                        <div>
                            <?php
                            Yii::import('application.extensions.EGMAP.*');
                            $gMap = new EGMap();
                            $gMap->setJsName('test_map');
                            $gMap->width = '100%';
                            $gMap->height = 300;
                            $gMap->zoom = 11;
                            $gMap->setCenter(39.737827146489174, 3.2830574338912477);

                            $info_box = new EGMapInfoBox('<div style="color:#fff;border: 1px solid black; margin-top: 8px; background: #000; padding: 5px;">I am a marker with info box!</div>');

                            $info_box->pixelOffset = new EGMapSize('0','-140');
                            $info_box->maxWidth = 0;
                            $info_box->boxStyle = array(
                                'width'=>'"280px"',
                                'height'=>'"120px"',
                                'background'=>'"url(http://google-maps-utility-library-v3.googlecode.com/svn/tags/infobox/1.1.9/examples/tipbox.gif) no-repeat"'
                            );
                            $info_box->closeBoxMargin = '"10px 2px 2px 2px"';
                            $info_box->infoBoxClearance = new EGMapSize(1,1);
                            $info_box->enableEventPropagation ='"floatPane"';

                            $marker = new EGMapMarker(39.721089311812094, 2.91165944519042, array('title' => 'Marker With Info Box'));

                            $marker->addHtmlInfoBox($info_box);

                            $gMap->addMarker($marker);

                            $gMap->renderMap();
                            ?>
                        </div>


                    </div>



                </div>
            </div>
            <?php endfor;?>

        </div>
    </div>
</div>



