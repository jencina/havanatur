

<?php

$form = $this->beginWidget(
    'booster.widgets.TbActiveForm',
    array(
        'id' => 'horizontalForm',
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well'), // for inset effect
    )
); ?>

    <fieldset>

        <?php echo $form->textFieldGroup(
            $model,
            'nombre',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                //'hint' => 'In addition to freeform text, any HTML5 text-based input appears like so.'
            )
        ); ?>

        <?php echo $form->textFieldGroup(
            $model,
            'apellido',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
              //  'hint' => 'In addition to freeform text, any HTML5 text-based input appears like so.'
            )
        ); ?>

        <?php echo $form->textFieldGroup(
            $model,
            'email',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                //  'hint' => 'In addition to freeform text, any HTML5 text-based input appears like so.'
            )
        ); ?>

        <?php echo $form->textFieldGroup(
            $model,
            'telefono',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                //  'hint' => 'In addition to freeform text, any HTML5 text-based input appears like so.'
            )
        ); ?>

        <?php echo $form->textFieldGroup(
            $model,
            'usuario',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
               // 'hint' => 'In addition to freeform text, any HTML5 text-based input appears like so.'
            )
        ); ?>

        <?php echo $form->passwordFieldGroup(
            $model,
            'contrasena',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                //'hint' => 'In addition to freeform text, any HTML5 text-based input appears like so.'
            )
        ); ?>

        <?php echo $form->dropDownListGroup(
            $model,
            'usuario_tipo_id',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'widgetOptions' => array(
                    'data' => CHtml::listData(UsuarioTipo::model()->findAll(),'id', 'nombre'),
                    'htmlOptions'=>array('prompt'=>'Seleccione Tipo Usuario')
                )
            )
        );  ?>

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
            <?php echo CHtml::link('Cancelar',array('usuario/admin'),array('class'=>'btn btn-danger')); ?>
        </div>


</fieldset>

<?php
$this->endWidget();
unset($form);
?>