<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin.css" rel="stylesheet">

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div id="menu">
    <div class="container">
        <?php

        $cot = count(Cotizacion::model()->findAllByAttributes(array('respondido'=>0)));

        $this->widget(
            'booster.widgets.TbNavbar',
            array(
                'type' => 'inverse',
                'brand' => 'HavanaTur',
                'brandUrl' => '#',
                'collapse' => true, // requires bootstrap-responsive.css
                'fixed' => false,
                'htmlOptions'=>array('style'=>'margin-bottom:0;'),
                'fluid' => true,

                'items' => array(
                    array(
                        'class' => 'booster.widgets.TbMenu',
                        'type' => 'navbar',
                        'encodeLabel' => false,
                        'items' => array(
                            array('label' => 'Usuarios', 'url' => array('usuario/admin')),
                            array('label' => 'Carousel', 'url' => array('carousel/admin')),
                            array('label' => 'Lightbox', 'url' => array('lightbox/admin')),
                            array('label' => 'Equipo', 'url' => array('equipo/admin')),
                            array('label' => 'Contenido', 'url' => array('contenido/admin')),
                            array('label' => 'Programa', 'url' => array('programa/admin')),
                            array('label' => 'Hotel', 'url' => array('hotel/admin')),
                            array('label' => 'Cotizaciones <span class="badge">'.$cot.'</span>', 'url' => array('cotizacion/index')),
                            array('label' => 'Configuraciones',
                                    'icon'  =>'fa fa-cog',
                                    'url'   => '',
                                    'items'=>array(
                                         array('label' => 'Configuracion', 'url' => array('configuracion/admin')),
										 array('label' => 'Condiciones Generales', 'url' => array('condiciones/admin')),
                                         array('label' => 'Ciudad', 'url' => array('ciudad/admin')),
                                    )
                            ),
                            array('label'=>'Logout ('.Yii::app()->user->name.')',  'icon'=>'fa fa-power-off', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                        ),

                ),
            )
        ));
        ?>
    </div>
</div>

<div class="container" id="page">

    <?php echo $content; ?>

    <div class="clear"></div>

    <div id="footer"></div><!-- footer -->

</div><!-- page -->

<div class="footer-wrapper">

    <div class="copyright">
        <div class="container">

            <div class="footer-copyright">
                Copyright © 2016
                HavanaTur
                Powered by
                <a target="_blank" href="">Jonathan Encina</a>


            </div>
        </div>

    </div>
</div>

</body>
</html>