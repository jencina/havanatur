<?php
    $this->breadcrumbs = array('Eventos Academicos','Eventos de '.$evento->evenCat->cat_nombre =>array('site/eventos','id'=>$evento->even_cat_id),$evento->even_titulo);
    $this->widthPageClass = '';
    $this->headerTitulo = $evento->even_titulo;
    $this->headerImagen = $evento->even_imagen_detail;
?>

<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="font-size: 18px;color:#898989;padding: 20px 25px">
    
    <?php echo $evento->even_contenido?>
    
    <style>
        .biography-icon {
            background-color: #ffffff;
            background-position: center center;
            background-repeat: no-repeat;
            border-radius: 50%;
            height: 70px !important;
            left: 50%;
            margin-left: -35px;
            margin-right: auto;
            margin-top: 10px;
            padding: 10px;
            position: absolute;
            width: 70px !important;
            line-height: 70px !important;
            cursor: pointer;
        }

        .biography-ctn {
            background-color: #f6f6f6;
            font-size: 16px;
            margin-top: 50px;
            padding: 50px 70px 65px;
        }
        
    </style>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 button-container" style="min-height: 80px">
            <a class="biography-icon cotizar" onclick="js:$('.biography-ctn').toggle('slow');"><i class="fa fa-user"></i></a>
            
            <div class="biography-ctn" style="display:none;min-width: 100%">            
                
                

    <?php
    $model = new Interesado();
    $form = $this->beginWidget(
        'booster.widgets.TbActiveForm',
        array(
            'id' => 'horizontalForm',
            'type' => 'vertical',
        )
    ); ?>

    <?php echo $form->textFieldGroup(
        $model,
        'int_nombre',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
        )
    ); ?>

        <?php echo $form->textFieldGroup(
            $model,
            'int_apellido',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
            )
        ); ?>

        <?php echo $form->textFieldGroup(
            $model,
            'int_email',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
            )
        ); ?>

        <?php echo $form->textFieldGroup(
            $model,
            'int_telefono',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
            )
        ); ?>

        <div class="form-actions col-md-12" >
            <?php $this->widget(
                'booster.widgets.TbButton',
                array(
                    'buttonType' => 'submit',
                    'type' => 'primary',
                    'label' => 'Guardar'
                )
            ); ?>
        </div>

<?php
$this->endWidget();
unset($form);
?>
                
            </div>
        </div>
    </div>
</div>

<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="font-size: 18px;color:#898989;padding: 20px 25px">
    <div class="page-header-detail btn-info">
        <h4 style="margin-top:15px;">
            <i class="fa fa-calendar"></i> Otros Eventos
        </h4>
    </div>
    <ul class="include list-group">
        <?php foreach($categorias as $cat){ ?>
            <li class="list-group-item">
                <?php echo CHtml::link('<span style="font-size: 17px;color:#898989;">Evento de '.$cat->cat_nombre.'</span>');?> 
            </li>
        <?php } ?>
    </ul>
</div>

<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="font-size: 18px;color:#898989;padding: 20px 25px">
    <div class="page-header-detail btn-info">
        <h4 style="margin-top:15px;">
            <i class="fa fa-info-circle"></i> Consultas
        </h4>
    </div>
    <ul class="include list-group">
        <li class="list-group-item">
            <span style="font-size: 17px"><i class="fa fa-envelope"></i><?php echo $evento->even_email; ?></span>
        </li>
        <li class="list-group-item"><span style="font-size: 17px"><i class="fa fa-phone-square"></i><?php echo $evento->even_telefono_1; ?></span></li>
        <li class="list-group-item"><span style="font-size: 17px"><i class="fa fa-phone-square"></i><?php echo $evento->even_telefono_2; ?></span></li>
    </ul>
</div>


