<?php 

$form = $this->beginWidget(
    'booster.widgets.TbActiveForm',
    array(
        'id' => 'horizontalForm',
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well')
    )
); ?>

<fieldset>
    
        <?php echo $form->textFieldGroup(
           $model,
           'cat_nombre',
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
            <?php echo CHtml::link('Cancelar',array('noticia/categorias'),array('class'=>'btn btn-danger')); ?>
        </div>

</fieldset>

<?php
$this->endWidget();
unset($form);
?>