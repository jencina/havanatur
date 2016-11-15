<?php

$form = $this->beginWidget(
    'booster.widgets.TbActiveForm',
    array(
        'id' => 'horizontalForm',
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well', 'enctype' => 'multipart/form-data')
    )
); ?>

    <fieldset>

        <?php echo $form->dropDownListGroup(
            $model,
            'contenido_adicional_posicion_id',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'widgetOptions' => array(
                    'data' =>  CHtml::listData(ContenidoAdicionalPosicion::model()->findAll(),'id', 'nombre'),
                    'htmlOptions' => array(),
                )
            )
        ); ?>

        <?php echo $form->hiddenField($model,'contenido_id');?>

        <?php echo $form->dropDownListGroup(
            $model,
            'contenido_adicional_tipo_id',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'widgetOptions' => array(
                    'data' =>  CHtml::listData(ContenidoAdicionalTipo::model()->findAll(),'id', 'nombre'),
                    'htmlOptions' => array()
                )
            )
        ); ?>

        <div id="contenido" class="form-actions col-md-12 cont" style="display: none">
            <?php echo $form->html5EditorGroup(
                $model,
                'contenido',
                array(
                    'widgetOptions' => array(
                        'editorOptions' => array(
                            'class' => 'span3',
                            'rows' => 5,
                            'height' => '200',
                            'options' => array('color' => true)
                        ),
                    )
                )
            ); ?>
        </div>

        <div id="mapa" class="form-actions col-md-12 cont" style="display: none">
            <?php echo $form->textFieldGroup(
                $model,
                'mapa',
                array(
                    'wrapperHtmlOptions' => array(
                        'class' => 'col-sm-5',
                    ),
                    //'hint' => 'In addition to freeform text, any HTML5 text-based input appears like so.'
                )
            ); ?>
        </div>

        <div class="form-actions col-md-12" >
            <?php $this->widget(
                'booster.widgets.TbButton',
                array(
                    'buttonType' => 'submit',
                    'type' => 'primary',
                    //'context' => 'primary',
                    'label' => 'Guardar'
                )
            ); ?>
            <?php echo CHtml::link('Cancelar',array('contenido/admin'),array('class'=>'btn btn-danger')); ?>
        </div>




    </fieldset>

<?php
$this->endWidget();
unset($form);
?>

<script>
    $(document).ready(function(){
        if( $("#ContenidoAdicional_contenido_adicional_tipo_id").val() == 1){
            $('#contenido').show();
        }else if( $("#ContenidoAdicional_contenido_adicional_tipo_id").val() == 2){
            $('#imagen').show();
        }
    });

    $("#ContenidoAdicional_contenido_adicional_tipo_id").change(function(){
        console.log('asd');
        $('.cont').hide();
        if($(this).val() == 1){
            $('#contenido').show();
        }else if($(this).val() == 3){
            $('#mapa').show();
        }
    });
</script>