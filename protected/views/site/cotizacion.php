<?php

$form = $this->beginWidget(
    'booster.widgets.TbActiveForm',
    array(
        'id' => 'cotizacion',
        'type' => 'vertical',
        //'htmlOptions' => array( 'enctype' => 'multipart/form-data')
    )
); ?>


        <?php echo $form->textFieldGroup(
            $cotizacion,
            'nombre',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
            )
        ); ?>

        <?php echo $form->textFieldGroup(
            $cotizacion,
            'apellidos',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
            )
        ); ?>

        <?php echo $form->textFieldGroup(
            $cotizacion,
            'telefono',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
            )
        ); ?>

        <?php echo $form->textFieldGroup(
            $cotizacion,
            'email',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
            )
        ); ?>

        <?php echo $form->textAreaGroup(
            $cotizacion,
            'comentario',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
            )
        ); ?>

<?php echo $form->hiddenField($cotizacion,'programa_combinacion_vigencia_id'); ?>


    <div class="modal-footer">
        <?php $this->widget(
            'booster.widgets.TbButton',
            array(
                'buttonType' => 'submit',
                'type' => 'primary',
                'label' => 'Enviar Cotizacion'

            )
        ); ?>
        <?php $this->widget(
            'booster.widgets.TbButton',
            array(
                'type' => 'danger',
                'label' => 'Cancelar',
                'htmlOptions' => array('data-dismiss' => 'modal'),
            )
        ); ?>
    </div>

<?php
$this->endWidget();
unset($form);
?>


<script>
    $('#modalCotizar form').submit(function(){

        $.ajax({
         url  : "<?php echo Yii::app()->createURL('site/cotizar');?>",
         type : 'post',
         cache: false ,
         data : $(this).serialize(),
         beforeSend : function(){
         $("#modalCotizar").modal("show");
         },
         success: function(data){
         if(data.status == 'success'){
         $("#modalCotizar .modal-body").html(data.div);
         }else{
         $("#modalCotizar .modal-body").html(data.div);
         }
         }
         });

        return false;

    });
</script>