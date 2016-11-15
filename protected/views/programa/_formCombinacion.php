
<?php

$form = $this->beginWidget(
    'booster.widgets.TbActiveForm',
    array(
        'id' => 'horizontalForm',
        'type' => 'vertical',
        'htmlOptions' => array('class' => 'well')
    )
); ?>

<fieldset>


    <?php echo $form->textFieldGroup(
        $combi,
        'ocupacion',
        array(
            'widgetOptions' => array(
                'editorOptions' => array(
                    'class' => 'span3',
                    'rows' => 4,
                    'height' => '150',
                    'options' => array('color' => true)
                ),
            )
        )
    ); ?>

    <?php echo $form->html5EditorGroup(
        $combi,
        'descripcion',
        array(
            'widgetOptions' => array(
                'editorOptions' => array(
                    'class' => 'span3',
                    'rows' => 4,
                    'height' => '150',
                    'options' => array('color' => true)
                ),
            )
        )
    ); ?>

	<?php if($combi->isNewRecord):?>
    <div class="panel panel-default hoteles">
        <div class="panel-heading">
            <h3 class="panel-title">Hoteles</h3>
        </div>
        <div class="panel-body">
            <?php

            foreach($ciudades as $index=>$ciudad){

                $this->renderPartial('_hotel',array('hotel'=>$ciudad['hotel'],'i'=>$index,'form'=>$form,'ciudad'=>$ciudad['ciudad']));
            }
            /*foreach($hoteles as $index=>$hotel){
                $this->renderPartial('_hotel',array('hotel'=>$hotel,'i'=>$index,'form'=>$form));
            }*/
            ?>
        </div>
    </div>
   <?php endif;?>

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
        <?php echo CHtml::link('Cancelar',array('programa/admin'),array('class'=>'btn btn-danger')); ?>
    </div>

</fieldset>

<?php
$this->endWidget();
unset($form);
?>


<script>
    $('#btn-hoteles').click(function(){
        var a   = $('.hotel').last().val();
        $.ajax({
            url  : "<?php echo Yii::app()->createURL('programa/setHotel');?>",
            type : 'post',
            cache: false ,
            data:{ i:a },
            success: function(data){
                $('.hoteles .panel-body').append(data.div);
            }
        });
        return false;
    });
</script>