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
                'ad_pasaporte',
            ),
                )
        );
        ?>
        <?php $this->endWidget(); ?>

    </div>
</div>
