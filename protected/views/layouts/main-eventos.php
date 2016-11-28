<?php /* @var $this Controller */ ?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="en">

        <!-- blueprint CSS framework -->

        <!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print"> -->

        <!--[if lt IE 8]>

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">

        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main-evento.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/lightbox2-master/css/lightbox.min.css">

    <!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">-->

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>
        
        <!--<div class="top">
            <div class="container">

                <?php
                $cambio1 = Configuracion::model()->findByAttributes(array('nombre' => 'tipo_cambio_1'));
                $cambio2 = Configuracion::model()->findByAttributes(array('nombre' => 'tipo_cambio_2'));
                ?>
                <div class="contenido">

                    <div class="body">
                        <div class="icon"><i class="fa fa-usd"></i></div>
                        <div class="titulo"><?php echo $cambio1->valor; ?></div>
                        <div class="valor"><?php echo $cambio1->valor2; ?></div>
                    </div>

                    <div class="body">
                        <div class="icon"><i class="fa fa-usd"></i></div>
                        <div class="titulo"><?php echo $cambio2->valor; ?></div>
                        <div class="valor"><?php echo $cambio2->valor2; ?></div>
                    </div>
                </div>
            </div>
        </div>-->
                <?php
                $programas = Programa::model()->findAll(array('condition' => 'activo =1 and programa_tipo_id = ' . $this->programas));

                $bloqueos = Programa::model()->findAll(array('condition' => 'activo =1 and programa_tipo_id = ' . $this->bloqueos));

                $otroDestinos = Programa::model()->findAll(array('condition' => 'activo =1 and programa_tipo_id = ' . $this->otroDestino));

                $turismoSaluds = Programa::model()->findAll(array('condition' => 'activo =1 and programa_tipo_id = ' . $this->turismoSalud));

                $otroServicios = Programa::model()->findAll(array('condition' => 'activo =1 and programa_tipo_id = ' . $this->otroServicio));

                $quienesSomos = Contenido::model()->findAllByAttributes(array('contenido_tipo_id' => $this->quienessomos));

                $informaciones = Contenido::model()->findAllByAttributes(array('contenido_tipo_id' => $this->informaciones));

                $otros = Contenido::model()->findAllByAttributes(array('contenido_tipo_id' => $this->otros));

                $turismos = Contenido::model()->findAllByAttributes(array('contenido_tipo_id' => $this->turismo));

                $programa = array();

                foreach ($programas as $pro) {

                    $programa[] = array('label' => $pro->nombre, 'url' => array('site/programa', 'id' => $pro->id));
                }

                $bloqueo = array();

                foreach ($bloqueos as $blo) {

                    $bloqueo[] = array('label' => $blo->nombre, 'url' => array('site/programa', 'id' => $blo->id));
                }

                /* $otroDestino = array();

                  foreach($otroDestinos as $otro){

                  $otroDestino[] = array('label' => $otro->nombre, 'url' => array('site/programa','id'=>$otro->id));

                  } */

                $turismoSalud = array();

                foreach ($turismoSaluds as $tur) {

                    $turismoSalud[] = array('label' => $tur->nombre, 'url' => array('site/programa', 'id' => $tur->id));
                }

                foreach ($turismos as $tur) {

                    $turismoSalud[] = array('label' => $tur->titulo, 'url' => array('site/TurismoSalud', 'id' => $tur->id));
                }

                $otroServicio = array();

                foreach ($otroServicios as $otro) {

                    $otroServicio[] = array('label' => $otro->nombre, 'url' => array('site/programa', 'id' => $otro->id));
                }

                foreach ($otros as $otro) {

                    $otroServicio[] = array('label' => $otro->titulo, 'url' => array('site/Otros', 'id' => $otro->id));
                }

                $quienesSomo = array();
                foreach ($quienesSomos as $qui) {

                    $quienesSomo[] = array('label' => $qui->titulo, 'url' => array('site/nuestraEmpresa', 'id' => $qui->id)); //strtoupper($qui->titulo)
                }

                $quienesSomo[] = array('label' => 'NUESTRO EQUIPO', 'url' => array('site/equipo'));

                $informacion = array();
                foreach ($informaciones as $info) {

                    $informacion[] = array('label' => $info->titulo, 'url' => array('site/informaciones', 'id' => $info->id));
                }?>
                
        <style>
        @media (min-width: 768px) and (max-width: 1200px) {
	.navbar-nav .open .dropdown-menu {
		position: static;
		float: none;
		width: auto;
		margin-top: 0;
		background-color: transparent;
		border: 0;
		-webkit-box-shadow: none;
		box-shadow: none;
	}
	.navbar-nav .open .dropdown-menu > li > a {
		line-height: 20px;
	}
	.navbar-nav .open .dropdown-menu > li > a,
	.navbar-nav .open .dropdown-menu .dropdown-header {
		padding: 5px 15px 5px 25px;
	}
	.dropdown-menu > li > a {
		display: block;
		padding: 3px 20px;
		clear: both;
		font-weight: normal;
		line-height: 1.42857143;
		color: #333;
		white-space: nowrap;
	}
    .navbar-header {
        float: none;
    }
    .navbar-toggle {
        display: block;
    }
    .navbar-collapse {
        border-top: 1px solid transparent;
        box-shadow: inset 0 1px 0 rgba(255,255,255,0.1);
    }
    .navbar-collapse.collapse {
        display: none!important;
    }
    .navbar-nav {
        float: none!important;
        /*margin: 7.5px -15px;*/
		margin: 7.5px 50px 7.5px -15px
    }
    .navbar-nav>li {
        float: none;
    }
    .navbar-nav>li>a {
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .navbar-text {
        float: none;
        margin: 15px 0;
    }
    /* since 3.1.0 */
    .navbar-collapse.collapse.in { 
        display: block!important;
    }
    .collapsing {
        overflow: hidden!important;
    }
}
        </style>
        
<?php
                $this->widget(
                    'booster.widgets.TbNavbar', array(
                    'id'=>'menu',
                    //'type' => 'inverse',
                    'brand' => '<img width="80" src="'.Yii::app()->request->baseUrl.'/images/logo-havana1.png">',
                    'brandOptions' => array('style' => 'padding:0;'),
                    'brandUrl' => '#',
                    'fixed' => 'top',
                    'htmlOptions' => array('class' => 'affix-top','id'=>'menu',),
                    'items' => array(
                        array(
                            'class' => 'booster.widgets.TbMenu',
                            'type' => 'navbar',
                            'items' => array(
                                array('label' => 'HOME', 'url' => array('site/index')),
                                array('label' => 'NUESTRA EMPRESA', 'url' => '#',
                                    'active' => (Yii::app()->controller->menu_activo == 'nuestraEmpresa') ? true : false,
                                    'items' => $quienesSomo
                                ),
                                array('label' => 'INFORMACION DEL DESTINO', 'url' => '#',
                                    'active' => (Yii::app()->controller->menu_activo == 'informaciones') ? true : false,
                                    'items' => $informacion
                                ),
                                array(
                                    'label' => 'PROGRAMA',
                                    'url' => '#',
                                    'active' => (Yii::app()->controller->menu_activo == 'programa') ? true : false,
                                    'items' => $programa
                                ),
                                /* array('label' => 'OTROS DESTINOS',
                                  'url'   =>'#',
                                  'items' => $otroDestino), */

                                /* array(
                                  'label' => 'BLOQUEOS',
                                  'url' => '#',
                                  'active' => (Yii::app()->controller->menu_activo == 'bloqueos') ? true : false,
                                  'items' => $bloqueo
                                  ), */
                                array(
                                    'label' => 'EVENTOS ACADEMICOS',
                                    'url' => '#',
                                    'active' => (Yii::app()->controller->menu_activo == 'eventos') ? true : false,
                                    'items' => array(
                                        array('label' => 'NOTICIAS', 'url' => array('site/noticias'))
                                    )
                                ),
                                array('label' => 'TURISMO Y SALUD',
                                    'active' => (Yii::app()->controller->menu_activo == 'turismoSalud') ? true : false,
                                    'url' => '#', 'items' => $turismoSalud),
                                array('label' => 'OTROS',
                                    'url' => '#',
                                    'active' => (Yii::app()->controller->menu_activo == 'otros') ? true : false,
                                    'items' => $otroServicio),
                            //array('label' => 'CONTACTO', 'url' =>'#'),
                            ),
                        ),
                    ),
                        )
                );
                ?>
        
        <style>
        header img {
           
        }
            
        </style>

        <?php if($this->headerTitulo != ''){?>
        <header class="masthead subhead" style="background-color: #000000;" > 
            <div class="header-wrapper">
                    <div class="" style="
                                    background-image: linear-gradient(55deg, rgba(0, 37, 117, 0.68) 0%, rgba(51, 30, 245, 0.32) 67%, rgba(121, 93, 93, 0.78) 100%), url(<?php echo Yii::app()->request->baseUrl.'/images/noticias/'.$this->img_450_350($this->headerImagen)?>);
                                    background-repeat: no-repeat;
                                    background-position: center,92% 100%;
                                    background-size: cover,420px 338px;
                                    padding-top: 25px;
                                    padding-bottom: 30px;
                                    min-height: 200px;">
                        
                    <div class="container" >
                        
                         <div class="compartir">
                            <a target="_blank" href="http://www.facebook.com/sharer.php?u=http://wwww.havanatur.cl&t=NorfiPC">
                                <div class="social-icon">
                                    <i class="fa fa-facebook"></i>
                                </div>
                            </a>
                            <a target="_blank" href="javascript:var dir=window.document.URL;var tit=window.document.title;var tit2=encodeURIComponent(tit);window.location.href=('http://twitter.com/?status='+tit2+'%20'+dir+'');">
                                <div class="social-icon">
                                    <i class="fa fa-twitter"></i>
                                </div>
                            </a>
                            <a target="_blank" href="https://plus.google.com/share?url=www.havanatur.cl">
                                <div class="social-icon">
                                    <i class="fa fa-google-plus"></i>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                            <h1 class="frase" style="line-height:150px;font-weight: 200;line-height: 1.2;color: #fff;font-size: 40px">
                                <?php echo $this->headerTitulo ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- header -->
        
        <?php }else{?>
            <header class="masthead subhead"> 
                <div class="header-wrapper">
                    <div class="header_bg">
                        <div class="container">
                            <div class="frase">
                                <span>El Especialista<br> de Cuba</span>
                            </div>

                            <div class="compartir">
                                <a target="_blank" href="http://www.facebook.com/sharer.php?u=http://wwww.havanatur.cl&t=NorfiPC">
                                    <div class="social-icon">
                                        <i class="fa fa-facebook"></i>
                                    </div>
                                </a>
                                <a target="_blank" href="javascript:var dir=window.document.URL;var tit=window.document.title;var tit2=encodeURIComponent(tit);window.location.href=('http://twitter.com/?status='+tit2+'%20'+dir+'');">
                                    <div class="social-icon">
                                        <i class="fa fa-twitter"></i>
                                    </div>
                                </a>
                                <a target="_blank" href="https://plus.google.com/share?url=www.havanatur.cl">
                                    <div class="social-icon">
                                        <i class="fa fa-google-plus"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header><!-- header -->
        <?php } ?>

        

        
        
        <div id="breadcrums" style="background-color:#f5f5f5;">
            <div class="container" >
            <?php if(isset($this->breadcrumbs)): ?>
            <?php
            $this->widget(
                    'booster.widgets.TbBreadcrumbs',
                    array(
                        'htmlOptions'=>array('style'=>'margin:0;','class'=>'breadcrumb'),
                        'homeLink' => CHtml::link('Home',array('site/index')),
                        //'links' => array($model->nombre)
                        'links' => $this->breadcrumbs
                    )
                );
            ?><!-- breadcrumbs -->
            <?php endif ?>          
            </div>
        </div>
        
        
        <div class="container <?php echo $this->widthPageClass?>" id="page">
            <?php echo $content; ?>
        </div>
        

        <div class="footer-wrapper">
            <div class="container">
                <div class="row">
                    <div class="footer">
                        <div class="">
                            <div class="footer-boxes">
                                <div class="footer-box  col-xs-12 col-sm-6 col-md-3">
                                    <h4>Programas</h4>

                                    <ul>
                                        <?php foreach ($programas as $pro): ?>
                                        <li>
                                            <?php echo CHtml::link($pro->nombre, array('site/programa', 'id' => $pro->id)); ?>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>

                                <div class="footer-box  col-xs-12 col-sm-6 col-md-3">
                                    <h4>Indicadores Economicos</h4>
                                    <ul id="indicadores">
                                    </ul>
                                </div>

                                <div class="footer-box  col-xs-12 col-sm-6 col-md-3">

                                    <h4>Siguenos</h4>

                                    <ul>
                                        <li>
                                            <a href="www.facebook.com">Facebook</a>
                                        </li>

                                        <li>
                                            <a href="www.twetter.com">Twitter</a>
                                        </li>

                                        <li>
                                            <a href="https://plus.google.com/">Google+</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="footer-box col-xs-12 col-sm-6 col-md-3">
                                    <h4>Ubicacion</h4>

                                    <ul>
                                        <li>
                                            <span><i class="fa fa-map-marker"></i></span> Padre Mariano # 82 Oficina 502.Providencia. Santiago de Chile
                                        </li>

                                        <li>
                                            <span><i class="fa fa-mobile"></i></span> (562) 22330844
                                        </li>

                                        <li>
                                            <span><i class="fa fa-envelope"></i></span> (562) 22330844
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="copyright">
                <div class="container">
                    <div class="footer-copyright">
                        Copyright © 2016
                        HavanaTur
                        Powered by
                        <a target="_blank" href="http://jesolutions.cl">JE Solutions</a>
                    </div>
                </div>
            </div>

        </div>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/lightbox2-master/js/lightbox.min.js"></script>
        <script>

            $(document).ready(function () {

                $.ajax({

                    url: "<?php echo Yii::app()->createURL('site/getIndicadoresHome'); ?>",
                    type: 'post',
                    dataType: 'json',
                    beforeSend: function () {
                        $('#indicadores').html('<i class="fa fa-circle-o-notch fa-spin fa-fw"></i>');
                    },
                    success: function (data) {
                        $('#indicadores').html(data.div);
                    }
                });
                return false;
            });

        </script>
    </body>
</html>
