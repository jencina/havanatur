<?php

$this->breadcrumbs = array('Perfil de Usuario');

?>

<style>
    .panel-success > .panel-heading {
        background-color: #002575;
        border-color: #000d5d;
        color: #fff;
    }
    
    .panel-heading .btn{
        padding: 0 12px;
    }
</style>

<div class="row">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-desktop fa-user"></i>
            Perfil de Usuario
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="thumbnail" style="background-color: inherit">
            <img src="<?php echo Yii::app()->request->baseUrl.'/images/user.png'?>" style="width: 200px">
            <div class="caption" style="text-align: center">
                <h3><?php echo Yii::app()->user->name?></h3>
                <p><span style="font-size: 17px">Eventos Inscritos: <span id="contador" class="label label-primary"><?php echo EventoHasInteresado::model()->countByAttributes(array('interesado_int_id'=>Yii::app()->user->id)); ?></span></span></p>
                <p>
                  <span style="font-size: 17px">Pasaporte:
                    <?php if(isset($adicional->ad_pasaporte )):?>
                    <div id="gallery" data-toggle="modal-gallery" data-target="#modal-gallery" data-filter="*" ><a href="<?php echo Yii::app()->request->baseUrl.'/images/passport/'.$adicional->ad_pasaporte; ?>" title="<?php echo $adicional->ad_pasaporte ?>" data-gallery><?php echo $adicional->ad_pasaporte?></a></div>
                    <?php endif;?>
                  </span>
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <?php
        $box =  $this->beginWidget(
                'booster.widgets.TbPanel', array(
                'title' => 'Datos',
                'headerIcon' => 'th-list',
                'padContent' => false,
                'htmlOptions' => array('class' => 'bootstrap-widget-table'),
                'context' => 'success',
                'headerButtons' => array(
                        array(
                            'class' => 'booster.widgets.TbButtonGroup',
                            'type' => 'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                            'buttons' => array(
                                array('label' => 'Editar', 'url' => array('user/editar')), // this makes it split :)
                            )
                        ),
                    )
                )
            );
        ?>
        <?php
        $this->widget(
                'booster.widgets.TbDetailView', array(
            'data' => $model,
            'attributes' => array(
                'int_nombre',
                'int_apellido',
                'int_email',
                'int_telefono',
                'int_celular',
                'int_rut',
                'regiones.nombre',
                'comunas.nombre'
            ),
                )
        );
        ?>
        <?php $this->endWidget(); ?>
        
        <?php
        $box = $this->beginWidget(
                'booster.widgets.TbPanel', array(
                'title' => 'Datos Adicionales',
                'headerIcon' => 'th-list',
                'padContent' => false,
                'context' => 'success',
                'htmlOptions' => array('class' => 'bootstrap-widget-table'),
                'headerButtons' => array(
                    array(
                        'class' => 'booster.widgets.TbButtonGroup',
                        'type' => 'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        'buttons' => array(
                            array('label' => 'Editar', 'url' => array('user/editarAdicional')), // this makes it split :)
                        )
                    ),
                    )
                )
        );
        ?>
        <?php
        $this->widget(
            'booster.widgets.TbDetailView', array(
            'data' => $adicional,
            'attributes' => array(
                'ad_profesion',
                'ad_especialidad',
                'ad_lugar_trabajo',
                'ad_contacto_nombre',
                'ad_contacto_telefono',
            ),
                )
        );
        ?>
        <?php $this->endWidget(); ?>

    </div>
</div>


<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>

<div id="blueimp-gallery" class="blueimp-gallery" data-use-bootstrap-modal="false">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>