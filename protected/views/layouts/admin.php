<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="en">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin.css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo Yii::app()->request->baseUrl; ?>/admin-files/css/smartadmin-production-plugins.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo Yii::app()->request->baseUrl; ?>/admin-files/css/smartadmin-production.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo Yii::app()->request->baseUrl; ?>/admin-files/css/smartadmin-skins.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo Yii::app()->request->baseUrl; ?>/admin-files/css/smartadmin-rtl.min.css">

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <?php
        $baseUrl = Yii::app()->baseUrl;
        $cs = Yii::app()->getClientScript();
        $cs->registerScriptFile($baseUrl . '/admin-files/js/app.config.seed.js',CClientScript::POS_END );
        $cs->registerScriptFile($baseUrl . '/admin-files/js/app.seed.js',CClientScript::POS_END );
        ?>

    </head>

    <body class="desktop-detected">

        <header id="header">
            <div id="logo-group">
                <span id=""> <img style="margin: 2px 3px 1px;width: 50px;float:left;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo-havana1.png" alt="Havanatur"> <h3 style="float:left;">Havanatur<small>v2.0</small></h3></span>
            </div>

            <!-- projects dropdown -->
            <div class="project-context hidden-xs">

            </div>

            <div class="pull-right">
                <!-- collapse menu button -->
                <div id="hide-menu" class="btn-header pull-right">
                    <span> <a href="javascript:void(0);" title="Collapse Menu" data-action="toggleMenu"><i class="fa fa-reorder"></i></a> </span>
                </div>

                <div id="logout" class="btn-header transparent pull-right">
                    <span> 
                        <!--<a href="<?php echo Yii::app()->request->baseUrl; ?>/login.php"data-action="userLogout" data-logout-msg="You can improve your security further after logging out by closing this opened browser"><i class="fa fa-sign-out"></i></a> -->
                        <?php echo CHtml::link('<i class="fa fa-sign-out"></i>',array('admin/logout'),array('title'=>"Sign Out"));?>
                    </span>
                </div>
            </div>
            <!-- end pulled right: nav area -->

        </header>

        <aside id="left-panel">
            <!-- User info -->
            <div class="login-info">
                <span> <!-- User image size is adjusted inside CSS, it should stay as is --> 

                    <a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/male.png" alt="me" class="online" /> 
                        <span>
<?php echo Yii::app()->user->name; ?> 
                        </span>
                    </a> 
                </span>
            </div>

            <nav>
<?php
$cot = count(Cotizacion::model()->findAllByAttributes(array('respondido' => 0)));

$this->widget('zii.widgets.CMenu', array(
    'encodeLabel' => false, //allows you to use html in labels
    'activateParents' => true,
    'items' => array(
        array('label' => '<i class="fa fa-lg fa-fw fa-home"></i><span class="menu-item-parent">Home</span>', 'url' => array('admin/home')),
        array('label' => '<i class="fa fa-lg fa-fw fa-users"></i><span class="menu-item-parent">Usuarios</span>', 'url' => array('usuario/admin')),
        array('label' => '<i class="fa fa-lg fa-fw fa-picture-o"></i><span class="menu-item-parent">Carrusel</span>', 'url' => array('carousel/admin')),
        array('label' => '<i class="fa fa-lg fa-fw fa-caret-square-o-right"></i><span class="menu-item-parent">Lightbox</span>', 'url' => array('lightbox/admin')),
        array('label' => '<i class="fa fa-lg fa-fw fa-users"></i><span class="menu-item-parent">Equipo</span>', 'url' => array('equipo/admin')),
        array('label' => '<i class="fa fa-lg fa-fw fa-keyboard-o "></i><span class="menu-item-parent">Contenido</span>', 'url' => array('contenido/admin')),
        array('label' => '<i class="fa fa-lg fa-fw fa-plane"></i><span class="menu-item-parent">Programa</span>', 'url' => array('programa/admin')),
        array('label' => '<i class="fa fa-lg fa-fw fa-building-o "></i><span class="menu-item-parent">Hotel</span>', 'url' => array('hotel/admin')),
        array('label' => '<i class="fa fa-lg fa-fw fa-file-text"></i><span class="menu-item-parent">Noticias</span>', 'url' => '',
            'items' => array(
                array('label' => 'Administrador', 
                        'url' => array('noticia/admin'),
                        'active' => (Yii::app()->controller->menu_activo == 'noticias') ? true : false
                    ),
                array('label' => 'Categorias',
                    'url' => array('noticia/categorias'),
                    'active' => (Yii::app()->controller->menu_activo == 'noticiascategorias') ? true : false
                    ),
            )
        ),
        array('label' => '<i class="fa fa-lg fa-fw fa-map-marker "></i><span class="menu-item-parent">Eventos</span>', 'url' => '',
            'items' => array(
                array('label' => 'Administrador', 
                        'url' => array('evento/admin'),
                        'active' => (Yii::app()->controller->menu_activo == 'eventos') ? true : false),
                array('label' => 'Categorias', 
                    'url' => array('evento/categorias'),
                    'active' => (Yii::app()->controller->menu_activo == 'eventoscategorias') ? true : false
                ),
                array('label' => 'Inscritos', 
                    'url' => array('evento/inscritos'),
                    'active' => (Yii::app()->controller->menu_activo == 'eventosinscritos') ? true : false
                    ),
            )
        ),
        array('label' => '<i class="fa fa-lg fa-fw fa-money"></i><span class="menu-item-parent">Cotizaciones</span> <span class="badge">' . $cot . '</span>', 'url' => array('cotizacion/index')),
        array('label' => '<i class="fa fa-lg fa-fw fa-cog"></i><span class="menu-item-parent">Configuraciones</span>',
            'url' => '',
            'items' => array(
                array('label' => 'Configuracion', 
                      'url' => array('configuracion/admin'),
                      'active' => (Yii::app()->controller->menu_activo == 'configuracion') ? true : false
                    ),
                array('label' => 'Condiciones Generales', 
                      'url' => array('condiciones/admin'),
                      'active' => (Yii::app()->controller->menu_activo == 'condicion') ? true : false),
                array('label' => 'Ciudad', 
                      'url' => array('ciudad/admin'),
                      'active' => (Yii::app()->controller->menu_activo == 'ciudad') ? true : false),
            )
        ),
        array('label' => '<i class="fa fa-lg fa-fw fa-sign-out"></i><span class="menu-item-parent">Logout (' . Yii::app()->user->name . ')</span>', 'icon' => 'fa fa-power-off', 'url' => array('/admin/logout'), 'visible' => !Yii::app()->user->isGuest)
    ),
));
?>

            </nav>
            <span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>

        </aside>    

        <div id="main" role="main">
            <div id="ribbon">
                <ol class="breadcrumb">
                    <?php if(isset($this->breadcrumbs)): ?>
                        <?php
                        $this->widget(
                                'booster.widgets.TbBreadcrumbs',
                                array(
                                    'htmlOptions'=>array('style'=>'margin:0;padding:0 !important;','class'=>'breadcrumb'),
                                    'homeLink' => CHtml::link('Home',array('admin/home')),
                                    //'links' => array($model->nombre)
                                    'links' => $this->breadcrumbs
                                )
                            );
                        ?><!-- breadcrumbs -->
                    <?php endif ?>   
                </ol>
            </div>

            <div id="content">
                <div class="row">
                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                        <h1 class="page-title txt-color-blueDark">
                            <?php if(!empty($this->pagetitulo)): ?>
                                <i class="fa-fw fa <?php echo $this->pageicon; ?>"></i>
                                <?php echo $this->pagetitulo;?>
                                <span><?php echo $this->pagesubtitulo;?></span>
                            <?php endif;?>
                        </h1>
                    </div>
                </div>
                
                <section id="widget-grid" class="">
                    <div class="row">
                        <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
                            <div id="wid-id-3" class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" data-widget-colorbutton="false" role="widget">
                                <header role="heading">
                                    <?php if(!empty($this->btncreate)){?>
                                    <div class="widget-toolbar" role="menu">
                                        <?php echo $this->btncreate; ?>
                                    </div>
                                    <?php } else if(!empty($this->btncreateajax)){ 
                                        echo '<div class="widget-toolbar" role="menu">';
                                        echo '<style>#uploadFile{height:30px;} #uploadFile .btn{padding: 0 3px;}</style>';
                                        $this->widget('ext.EAjaxUpload.EAjaxUpload',
                                                array(
                                                    'id'=>'uploadFile',
                                                    'config'=>array(
                                                        'action'=>$this->btncreateajax['url'],
                                                        'allowedExtensions'=>array("jpg","png"),//array("jpg","jpeg","gif","exe","mov" and etc...
                                                        'sizeLimit'=>50*1024*1024,// maximum file size in bytes
                                                        'multiple'=>false,
                                                        'onSubmit'=> "js:function(id, fileName){
                                                         $('#ajaxupload').button('loading');
                                                         $('ul.qq-upload-list').remove();
                                                        }",
                                                        'onComplete'=>"js:function(id, fileName, responseJSON){
                                                        $.fn.yiiListView.update('".$this->btncreateajax['id']."',{});
                                                        $('#ajaxupload').button('reset');
                                                        }",

                                                    )
                                                ));
                                        echo '</div>';
                                                            
                                        }?>
                                </header> 
                                <div role="content"> 
                                    <div class="widget-body <?php echo $this->padding;?>">
                                         <?php echo $content; ?> 
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </section>
            </div>
        </div>

        <!-- PAGE FOOTER -->
        <div class="page-footer">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <span class="txt-color-white">Copyright © 2016
                        HavanaTur
                        Powered by<span class="hidden-xs"> - <a target="_blank" href="http://www.jesolutions.cl">JE Solutions</a></span> © <?php echo date('Y')?></span>
                </div>
            </div>
        </div>


    </body>
</html>