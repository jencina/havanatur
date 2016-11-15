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

    <?php

        echo $form->textFieldGroup(
            $model,
            'nombre',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'widgetOptions' => array(
                    'htmlOptions' => array('disabled' => ($model->isNewRecord)?false:true)
                )
            )
        );


    ?>

    <?php echo $form->textFieldGroup(
        $model,
        'valor',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5'
            ),
        )
    );?>

    <?php echo $form->textFieldGroup(
        $model,
        'valor2',
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
                //'context' => 'primary',
                'label' => 'Guardar'
            )
        ); ?>
        <?php echo CHtml::link('Cancelar',array('configuracion/admin'),array('class'=>'btn btn-danger')); ?>
    </div>


</fieldset>

<?php
$this->endWidget();
unset($form);
?>