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
           'even_titulo',
           array(
               'wrapperHtmlOptions' => array(
                   'class' => 'col-sm-5',
               ),
           )
        ); ?>
    
        <?php echo $form->textFieldGroup(
           $model,
           'even_subtitulo',
           array(
               'wrapperHtmlOptions' => array(
                   'class' => 'col-sm-5',
               ),
           )
        ); ?>
    
         <?php echo $form->html5EditorGroup(
            $model,
            'even_contenido',
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

	<?php echo $form->fileFieldGroup($model, 'even_imagen',
                array(
                        'wrapperHtmlOptions' => array(
                                'class' => 'col-sm-5',
                        ),
                )
        ); ?>
    
        <?php echo $form->fileFieldGroup($model, 'even_imagen_detail',
                array(
                        'wrapperHtmlOptions' => array(
                                'class' => 'col-sm-5',
                        ),
                )
        ); ?>

	<?php echo $form->textFieldGroup(
           $model,
           'even_fecha',
           array(
               'wrapperHtmlOptions' => array(
                   'class' => 'col-sm-5',
               ),
           )
        ); ?>
    
        <?php /* echo $form->datePickerGroup(
            $model,
            'even_fecha',
            array(
                    'widgetOptions' => array(
                            'options' => array(
                                    'language' => 'es',
                            ),
                    ),
                    'wrapperHtmlOptions' => array(
                            'class' => 'col-sm-5',
                    ),
                    'hint' => 'Click inside! This is a super cool date field.',
                    'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'
            )
        ); */ ?>

	 <?php echo $form->textFieldGroup(
           $model,
           'even_email',
           array(
               'wrapperHtmlOptions' => array(
                   'class' => 'col-sm-5',
               ),
           )
        ); ?>
    
         <?php echo $form->textFieldGroup(
           $model,
           'even_telefono_1',
           array(
               'wrapperHtmlOptions' => array(
                   'class' => 'col-sm-5',
               ),
           )
        ); ?>
    
         <?php echo $form->textFieldGroup(
           $model,
           'even_telefono_2',
           array(
               'wrapperHtmlOptions' => array(
                   'class' => 'col-sm-5',
               ),
           )
        ); ?>
    
         <?php  echo $form->dropDownListGroup(
            $model,
            'even_cat_id',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'widgetOptions' => array(
                    'data' => CHtml::listData(EventoCategoria::model()->findAll(),'cat_id', 'cat_nombre'),
                    'htmlOptions'=>array('prompt'=>'Seleccione Categoria')
                )
            )
        );?>
    
        <?php echo $form->switchGroup($model, 'even_activo'); ?>
    
        <?php echo $form->switchGroup($model, 'even_destacado'); ?>
    
        <div class="row">
            <div class="col-md-6" style="text-align: right"><h4>Tarifas Evento:</h4></div>
        </div>
    
         
        <div class="form-group">
            <label class="col-sm-3 control-label">Hoteles</label>
            <?php
            $form->widget('booster.widgets.TbSelect2',array(
                                'model'=>$hoteles,//= Activity::model(),                  
                                'attribute'=>'hotel_id',
                                'value'=>$hoteles->hotel_id,                            
                                'data'=> CHtml::listData(Hotel::model()->findAllByAttributes(array("activo"=>1),array('order'=>'nombre ASC')),'id', 'nombre'),
                                'options'=>array(
                                    'class'=>'col-sm-5 col-sm-9',
                                    //'width'=>'200px',
                                    'placeholder'=>'Seleccione Hotel', // add this line
                                    // 'allowClear'=>true,  
                                ),
                                'htmlOptions'=>array('id'=>'EventoTarifaHasHotel','class'=>'col-sm-5 col-sm-9','multiple'=>'multiple',)
                        ));

            echo $form->error($hoteles,'hotel_id');
            ?>
        </div>
        
    
        <?php //echo $form->dropDownList($hoteles, 'hotel_id', CHtml::listData(Hotel::model()->findAllByAttributes(array("activo"=>1),array('order'=>'nombre ASC')),'id','nombre'), array('id' => 'country_list', 'multiple' => true)) ?>
    
        <?php
        
        echo $form->textFieldGroup(
           $tarifa,
           'tar_plan',
           array(
               'wrapperHtmlOptions' => array(
                   'class' => 'col-sm-5',
               ),
           )
        ); 
        
        echo $form->textFieldGroup(
           $tarifa,
           'tar_sgl',
           array(
               'wrapperHtmlOptions' => array(
                   'class' => 'col-sm-5',
               ),
           )
        ); 
        
        echo $form->textFieldGroup(
           $tarifa,
           'tar_dbl',
           array(
               'wrapperHtmlOptions' => array(
                   'class' => 'col-sm-5',
               ),
           )
        );
        
        ?>
    
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