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
    
        <?php echo $form->select2Group(
            $model,
            'regiones_id',
            array(
                'wrapperHtmlOptions' => array(
                        'class' => 'col-sm-5',
                ),
                'widgetOptions' => array(
                    'val'=>$model->regiones_id,
                    'data'=> CHtml::listData(Regiones::model()->findAll(array('order'=>'nombre ASC')),'id', 'nombre'),
                    'events' => array('change' => 'js:function(){ loadComuna($(this).val()); }'),
                    'options' => array(
                            'placeholder' => 'Seleccione Region',
                           // 'tokenSeparators' => array(',', ' ')
                    )
                )
            )
        );?>
    
        <?php echo $form->select2Group(
        $model,
        'comunas_id',
        array(
                'wrapperHtmlOptions' => array(
                        'class' => 'col-sm-5',
                ),
                'widgetOptions' => array(
                        'val'=>$model->comunas_id,
                        'data'=> (empty($model->regiones_id))?array():CHtml::listData(Comunas::model()->findAllByAttributes(array("regiones_id"=>$model->regiones_id),array('order'=>'nombre ASC')),'id', 'nombre'),
                        'options' => array(
                                'placeholder' => 'Seleccione Comuna',
                                //'tokenSeparators' => array(',', ' ')
                        )
                )
        )
        );?>
    
        <?php if($model->isNewRecord):?>
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

         <?php endif;?>
        
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

function loadComuna(id){
    
    $.ajax({
        url  : "<?php echo Yii::app()->createURL('user/loadComunas');?>",
        type : 'post',
        dataType: 'json',
        data : {id:id},
        beforeSend : function(){
            $("#btn-int").button('loading');
        },
        success: function(re){
            $("#Interesado_comunas_id").html("");
            $("#Interesado_comunas_id").html(re.data);
        },
        complete:function(){
             $("#btn-int").button('reset');
        }
    });
    return false;
    
}

</script>

