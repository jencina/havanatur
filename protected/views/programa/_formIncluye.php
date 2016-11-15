

<?php

$form = $this->beginWidget(
    'booster.widgets.TbActiveForm',
    array(
        'id' => 'incluyeForm',
        'type' => 'vertical',
        'htmlOptions' => array('class' => 'well', 'enctype' => 'multipart/form-data')
    )
); ?>

<fieldset>

    <?php echo $form->textAreaGroup(
        $model,
        'nombre',
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
    );

    ?>

    <input type="hidden" class="hotel" name="programa" value="<?php echo $programa?>">

</fieldset>

<div class="modal-footer">
    <?php $this->widget(
        'booster.widgets.TbButton',
        array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => 'Save changes',
        )
    ); ?>
    <?php $this->widget(
        'booster.widgets.TbButton',
        array(
            'type' => 'danger',
            'label' => 'Close',
            'url' => '#',
            'htmlOptions' => array('data-dismiss' => 'modal'),
        )
    ); ?>
</div>

<?php
$this->endWidget();
unset($form);
?>


<script>
    $('#incluyeForm').submit(function(){
        var data = $("#modalIncluye .modal-body form").serialize();

        $.ajax({
            url  : "<?php echo Yii::app()->createURL('programa/saveIncluye',array('id'=> $model->id));?>",
            type : 'post',
            dataType:'json',
            data : data,
            success: function(data){

                if(data.result == 'insert'){
                    $("#modalIncluye .modal-body").html('Registro Guardado con exito');
                    $("#list-incluye").append(data.link);
                }else if(data.result == 'update'){
                    $("#modalIncluye .modal-body").html('Registro Guardado con exito');
                    $("#list-incluye #li-"+data.id).replaceWith(data.link);
                }else{
                    $("#modalIncluye .modal-body").html(data.data);
                }

            }
        });
        return false;
    });
    </script>