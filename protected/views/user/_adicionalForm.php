    <?php
    
    $form = $this->beginWidget(
        'booster.widgets.TbActiveForm',
        array(
            'id' => 'interesado-form',
            'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well')
        )
    ); ?>

<fieldset>
    
    <div class="row">
        <div class="col-md-6" style="text-align: right"><h4>Datos Personales:</h4></div>
    </div>
    
    
        <?php echo $form->textFieldGroup(
        $model,
        'ad_profesion',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
        )
        ); ?>
    
        <?php echo $form->textFieldGroup(
        $model,
        'ad_especialidad',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
        )
        ); ?>
    
        <?php echo $form->textFieldGroup(
        $model,
        'ad_lugar_trabajo',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
        )
        ); ?>
    
        <?php echo $form->textFieldGroup(
        $model,
        'ad_pasaporte',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
        )
        ); ?>
    
        <hr>
    
        <div class="row">
            <div class="col-md-6" style="text-align: right"><h4>Datos Contacto:</h4></div>
        </div>
    
        <?php echo $form->textFieldGroup(
        $model,
        'ad_contacto_nombre',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
        )
        ); ?>
    
        <?php echo $form->textFieldGroup(
        $model,
        'ad_contacto_telefono',
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
                    'label' => 'Registrar',
                    'loadingText'=>'<i class="fa fa-circle-o-notch fa-spin"></i> Enviando ...',
                    'htmlOptions'   => array('id'=> 'btn-int'),
                )
            ); ?>
        </div>
</fieldset>
<?php
$this->endWidget();
unset($form);
?>


