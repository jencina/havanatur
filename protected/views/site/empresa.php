
<div class="page-header">
    <h1>
INFORMACION EMPRESA
<small></small>
    </h1>
</div>

<div class="col-md-6">
    <div class="col-md-12">
        HAVANATUR CHILE es un turoperador parte integrante del Grupo Internacional de Turoperadores y Agencias de Viajes Havanatur S.A, su presencia en el mercado internacional data de hace más de 35 años, constituyendo su razón la promoción y comercialización del destino turístico cubano, su posicionamiento y experiencia hace que se le reconozca internacionalmente como: El Especialista de Cuba, cuenta con una sólida estructura integrada por más de 50 Agencias de viajes distribuidas en propias y agencias representadas en un número significativo de países.
        Han transcurrido más de 20 años desde que Havanatur comenzó en Chile a convertir sueños en realidades haciendo posible el reto de satisfacer y cumplir con las expectativas de los clientes en su motivación de viajar para conocer esa encantadora y fascinante isla caribeña, hoy convertida en uno de los destinos turísticos más importantes y atractivos del Caribe, dado la diversidad de sus entornos naturales, opciones e infraestructura a disposición del que la visita.
    </div>

</div>

<div class="col-md-6">
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


<div class="col-md-6">
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

<div class="col-md-6">
    Nuestras Fortalezas
    1.	Es el único Tour Operador que tiene Cuba, con receptivo propio en la isla y sin intermediarios.
    2.	Pertenecemos al Ministerio de Turismo de Cuba.
    3.	Experiencia de 30 años en el rubro turístico.
    4.	Presencia en más de 40 países.
    5.	Más de 80 agencias de viajes operan con Havanatur.
    6.	Moderna Flota de Omnibus.
    7.	Convenios con Hotelería.

    </div>