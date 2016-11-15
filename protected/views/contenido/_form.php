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

    <?php echo $form->textFieldGroup(
        $model,
        'titulo',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            //'hint' => 'In addition to freeform text, any HTML5 text-based input appears like so.'
        )
    ); ?>

	<!--  redactorGroup  html5EditorGroup -->
    <?php echo $form->html5EditorGroup(
        $model,
        'contenido',
        array(
            'widgetOptions' => array(
                'editorOptions' => array(
                    'class' => 'span3',
                    'rows' => 6,
                    'height' => '250'
                ),
            )
        )
    ); ?>


    <?php echo $form->dropDownListGroup(
        $model,
        'contenido_tipo_id',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            'widgetOptions' => array(
                'data' =>  CHtml::listData(ContenidoTipo::model()->findAll(),'id', 'nombre'),
                'htmlOptions' => array(),
            )
        )
    ); ?>

    <?php echo $form->textFieldGroup(
        $model,
        'orden',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            //'hint' => 'In addition to freeform text, any HTML5 text-based input appears like so.'
        )
    ); ?>

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