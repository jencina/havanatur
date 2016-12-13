

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
        )
    ); ?>

    <?php echo $form->textFieldGroup(
        $model,
        'precio_desde',
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
                    'rows' => 4,
                    'height' => '150',
                    'options' => array('color' => true)
                ),
            )
        )
    ); ?>

    <?php  echo $form->dropDownListGroup(
        $model,
        'programa_tipo_id',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            'widgetOptions' => array(
                'data' => CHtml::listData(ProgramaTipo::model()->findAll(),'id', 'nombre'),
                'htmlOptions'=>array('prompt'=>'Seleccione Tipo')
            )
        )
    );?>

    <?php echo $form->textFieldGroup(
        $model,
        'orden',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
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

    <?php echo $form->switchGroup($model, 'destacado',
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
	
	<?php echo $form->switchGroup($model, 'chd2',
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

    <div class="panel panel-default ciudades">
        <div class="panel-heading">
            <h3 class="panel-title">Ciudades<?php echo CHtml::link('Agregar','',array('style'=>'color:#fff;float: right;','id'=>'btn-ciudades','class'=>'btn btn-success btn-agregar'));?></h3>
        </div>
        <div class="panel-body">
            <?php foreach($ciudades  as $index=>$ciudad){
                $this->renderPartial('_ciudad',array('ciudad'=>$ciudad,'i'=>$index,'form'=>$form));
            }
            ?>
        </div>
    </div>

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
    $('#btn-ciudades').click(function(){
        var a   = $('.ciudad').last().val();
        $.ajax({
            url  : "<?php echo Yii::app()->createURL('programa/setCiudad');?>",
            type : 'post',
            cache: false ,
            data:{ i:a },
            success: function(data){
                $('.ciudades .panel-body').append(data.div);
            }
        });
        return false;
    });
</script>