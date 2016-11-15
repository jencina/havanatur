

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

    <?php echo $form->textAreaGroup(
        $model,
        'descripcion',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            //'hint' => 'In addition to freeform text, any HTML5 text-based input appears like so.'
        )
    ); ?>

    <?php echo $form->radioButtonListGroup(
        $model,
        'activo',
        array(
            'widgetOptions' => array(
                'data' => array(
                    'Inactivo',
                    'Activo',

                )
            )
        )
    ); ?>

    <?php echo $form->fileFieldGroup(
        $model,
        'foto',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            //'hint' => 'In addition to freeform text, any HTML5 text-based input appears like so.'
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
        <?php echo CHtml::link('Cancelar',array('carousel/admin'),array('class'=>'btn btn-danger')); ?>
    </div>


</fieldset>

<?php
$this->endWidget();
unset($form);
?>