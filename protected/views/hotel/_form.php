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
        'nombre',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            //'hint' => 'In addition to freeform text, any HTML5 text-based input appears like so.'
        )
    ); ?>

    <?php echo $form->html5EditorGroup(
        $model,
        'descripcion',
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

    <?php
    /* echo $form->textAreaGroup(
        $model,
        'descripcion',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            //'hint' => 'In addition to freeform text, any HTML5 text-based input appears like so.'
        )
    ); */?>

    <?php echo $form->dropDownListGroup(
        $model,
        'estrellas',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            'widgetOptions' => array(
                'data' => array('Seleccione ...', '1', '2', '3', '4', '5'),
                'htmlOptions' => array(),
            )
        )
    ); ?>

    <?php echo $form->switchGroup($model, 'activo',
        array(
            'widgetOptions' => array(
                'events'=>array(
                    'switchChange'=>'js:function(event, state) {
						 // console.log(this); // DOM element
						  //console.log(event); // jQuery event
						  //console.log(state); // true | false
						}'
                )
            )
        )
    ); ?>

    <?php  echo $form->dropDownListGroup(
        $model,
        'ciudad_id',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            'widgetOptions' => array(
                'data' => CHtml::listData(Ciudad::model()->findAll(),'id', 'nombre'),
                'htmlOptions'=>array('prompt'=>'Seleccione Ciudad')
            )
        )
    );?>

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
        <?php echo CHtml::link('Cancelar',array('hotel/admin'),array('class'=>'btn btn-danger')); ?>
    </div>


</fieldset>

<?php
$this->endWidget();
unset($form);
?>