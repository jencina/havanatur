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
           'not_titulo',
           array(
               'wrapperHtmlOptions' => array(
                   'class' => 'col-sm-5',
               ),
           )
        ); ?>
    
        <?php echo $form->textFieldGroup(
           $model,
           'not_subtitulo',
           array(
               'wrapperHtmlOptions' => array(
                   'class' => 'col-sm-5',
               ),
           )
        ); ?>
    
        <?php echo $form->html5EditorGroup(
            $model,
            'not_contenido',
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
    
        
        <?php /*echo $form->textAreaGroup(
                $model,
                'not_contenido',
                array(
                        'wrapperHtmlOptions' => array(
                                'class' => 'col-sm-5',
                        ),
                        'widgetOptions' => array(
                                'htmlOptions' => array('rows' => 5),
                        )
                )
        );*/ ?>
    
        <?php echo $form->fileFieldGroup($model, 'not_imagen',
                array(
                        'wrapperHtmlOptions' => array(
                                'class' => 'col-sm-5',
                        ),
                )
        ); ?>
    
        <?php echo $form->fileFieldGroup($model, 'not_imagen_detail',
                array(
                        'wrapperHtmlOptions' => array(
                                'class' => 'col-sm-5',
                        ),
                )
        ); ?>
    
        <?php echo $form->textFieldGroup(
           $model,
           'not_fecha',
           array(
               'wrapperHtmlOptions' => array(
                   'class' => 'col-sm-5',
               ),
           )
        ); ?>
    
        <?php  echo $form->dropDownListGroup(
            $model,
            'categoria_cat_id',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'widgetOptions' => array(
                    'data' => CHtml::listData(Categoria::model()->findAll(),'cat_id', 'cat_nombre'),
                    'htmlOptions'=>array('prompt'=>'Seleccione Ciudad')
                )
            )
        );?>
    
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
            <?php echo CHtml::link('Cancelar',array('noticia/admin'),array('class'=>'btn btn-danger')); ?>
        </div>

</fieldset>

<?php
$this->endWidget();
unset($form);
?>