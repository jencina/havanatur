    <?php
    
    $form = $this->beginWidget(
        'booster.widgets.TbActiveForm',
        array(
            'id' => 'interesado-form',
            'type' => 'vertical',
        )
    ); ?>
                
    <div class="page-header" style="text-align:center;">
        <h1>
            Formulario Registro Evento
        </h1>
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


<script>

$("#interesado-form").submit(function(){
    
    $.ajax({
        url  : "<?php echo Yii::app()->createURL('site/setInteresado',array('id'=>$evento->even_id));?>",
        type : 'post',
        cache: false ,
        data : $(this).serialize(),
        beforeSend : function(){
            
        },
        success: function(data){
            $("#interesado").html(data);
        }
    });
    
    return false;
});
</script>
