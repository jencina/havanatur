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

        <?php echo $form->textFieldGroup(
            $model,
            'int_celular',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
            )
        ); ?>

        <?php echo $form->textFieldGroup(
            $model,
            'int_rut',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
            )
        ); ?>
    
        <hr>
    
        <div class="row">
            <div class="col-md-6" style="text-align: right"><h4>Datos Usuario:</h4></div>
        </div>
        
         
        <?php echo $form->textFieldGroup(
            $model,
            'int_user',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
            )
        ); ?>
        
         <?php echo $form->passwordFieldGroup(
            $model,
            'int_password',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
            )
        ); ?>
        
        <?php echo $form->passwordFieldGroup(
            $model,
            'int_password_repetir',
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


<script>

$("#interesado-form").submit(function(){
    
    $.ajax({
        url  : "<?php echo Yii::app()->createURL('site/registrar');?>",
        type : 'post',
        dataType: 'json',
        data : $(this).serialize(),
        beforeSend : function(){
            $("#btn-int").button('loading');
        },
        success: function(data){
            if(data.status == "failed"){
                $("#interesado").html(data.data);
            }else if(data.status == "success"){
                 $("#interesado").html(data.data);
                 setTimeout(
                  window.location.href = "<?php echo Yii::app()->createURL('site/ingresar');?>"
                , 5000);
                
            }
            
        },
        complete:function(){
             $("#btn-int").button('reset');
        }
    });
    
    return false;
});
</script>
