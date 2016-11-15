<?php

$form = $this->beginWidget(
    'booster.widgets.TbActiveForm',
    array(
        'id' => 'formTarifa',
        'type' => 'vertical',
        'htmlOptions' => array('class' => 'well', 'enctype' => 'multipart/form-data')
    )
); ?>

<fieldset>

    <div class="col-md-12 hotel">

        <input type="hidden" id="id" name="id" value="<?php echo $id;?>"/>

        <div class="col-md-12">
            <?php echo $form->datePickerGroup(
                $vigencia,
                'desde',
                array(
                    'widgetOptions' => array(
                        'options' => array(
                            'format'=>'yyyy-mm-dd',
                            'language' => 'es',
                            'autoclose'=> true,
                        ),

                    ),
                    'wrapperHtmlOptions' => array(
                        'class' => 'col-sm-5',
                    ),
                    // 'hint' => 'Click inside! This is a super cool date field.',
                    'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'
                )
            );?>
        </div>

        <div class="col-md-12">
            <?php echo $form->datePickerGroup(
                $vigencia,
                'hasta',
                array(
                    'widgetOptions' => array(
                        'options' => array(
                            'format'=>'yyyy-mm-dd',
                            'language' => 'es',
                            'autoclose'=> true,
                        ),

                    ),
                    'wrapperHtmlOptions' => array(
                        'class' => 'col-sm-5',
                    ),
                    // 'hint' => 'Click inside! This is a super cool date field.',
                    'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'
                )
            );?>
        </div>
		
		<div class="col-md-12">
		 <?php echo $form->textFieldGroup(
				$vigencia,
				'comentario',
				array(
					'wrapperHtmlOptions' => array(
						'class' => 'col-sm-5',
					),
				)
			); ?>
		</div>
		
		<?php echo $form->hiddenField($vigencia,'id');?>


    </div>


<div class="col-md-12 combi-price">

    <?php foreach($tarifas as $i=>$tarifa):?>
        <div class="col-md-12 btn-info">
            <div>
                <?php echo $form->hiddenField($tarifa, 'nombre',array('name'=>'Tarifa['.$i.'][nombre]')); ?>
                <div class="col-xs-2"><?php echo $form->textFieldGroup(
                        $tarifa,
                        'dbl',
                        array(
                            'widgetOptions' => array(
                                'htmlOptions'=>array('id'=>'Tarifa_'.$i.'_dbl','name'=>'Tarifa['.$i.'][dbl]'),

                                'editorOptions' => array(
                                    'class' => 'span3',
                                    'rows' => 4,
                                    'height' => '150',
                                    'options' => array('color' => true),
                                ),
                            )
                        )
                    ); ?></div>
                <div class="col-xs-2"><?php echo $form->textFieldGroup(
                        $tarifa,
                        'sgl',
                        array(
                            'widgetOptions' => array(
                                'htmlOptions'=>array('id'=>'Tarifa_'.$i.'_sgl','name'=>'Tarifa['.$i.'][sgl]'),
                                'editorOptions' => array(
                                    'class' => 'span3',
                                    'rows' => 4,
                                    'height' => '150',
                                    'options' => array('color' => true)
                                ),
                            )
                        )
                    ); ?></div>
                <div class="col-xs-2"><?php echo $form->textFieldGroup(
                        $tarifa,
                        'tpl',
                        array(
                            'widgetOptions' => array(
                                'htmlOptions'=>array('id'=>'Tarifa_'.$i.'_tpl','name'=>'Tarifa['.$i.'][tpl]'),
                                'editorOptions' => array(
                                    'class' => 'span3',
                                    'rows' => 4,
                                    'height' => '150',
                                    'options' => array('color' => true)
                                ),
                            )
                        )
                    ); ?></div>
                <div class="col-xs-2"><?php echo $form->textFieldGroup(
                        $tarifa,
                        'chd',
                        array(
                            'widgetOptions' => array(
                                'htmlOptions'=>array('id'=>'Tarifa_'.$i.'_chd','name'=>'Tarifa['.$i.'][chd]'),
                                'editorOptions' => array(
                                    'class' => 'span3',
                                    'rows' => 4,
                                    'height' => '150',
                                    'options' => array('color' => true)
                                ),
                            )
                        )
                    ); ?></div>
					
				<?php if($combi->programa->chd2 == 1):?>	
				<div class="col-xs-2"><?php echo $form->textFieldGroup(
                        $tarifa,
                        'chd2',
                        array(
                            'widgetOptions' => array(
                                'htmlOptions'=>array('id'=>'Tarifa_'.$i.'_chd2','name'=>'Tarifa['.$i.'][chd2]'),
                                'editorOptions' => array(
                                    'class' => 'span3',
                                    'rows' => 4,
                                    'height' => '150',
                                    'options' => array('color' => true)
                                ),
                            )
                        )
                    ); ?></div>
				<?php endif; ?>
					
					
            </div>

        </div>
		<?php echo $form->hiddenField($tarifa,'id',array('id'=>'Tarifa_'.$i.'_id','name'=>'Tarifa['.$i.'][id]'));?>
    <?php endforeach;?>

</div>

</fieldset>

    <div class="modal-footer" >
        <?php $this->widget(
            'booster.widgets.TbButton',
            array(
                'buttonType' => 'submit',
                'type' => 'primary',
                'label' => 'Guardar'
            )
        ); ?>
        <?php $this->widget(
            'booster.widgets.TbButton',
            array(
                'type' => 'danger',
                'label' => 'Cerrar',
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

    $("#formTarifa").submit(function(){
		
        $.ajax({
            url  : $(this).attr('action'),
            type : 'post',
            cache: false ,
            data : $(this).serialize(),
			beforeSend : function(){
				$("#modalTarifa form input").attr("disabled",true);
				$("#modalTarifa form button").attr("disabled",true);
			},
            success: function(data){
                if(data.status == 'success'){
                    $("#panel"+data.id).append(data.div);
                    $("#modalTarifa .modal-body").html(data.message);
                }else{
                    $("#modalTarifa .modal-body").html(data.div);
                }
            },complete:function(){
				$.fn.yiiListView.update('combinaciones');
				$("#modalTarifa form input").attr("disabled",false);
				$("#modalTarifa form button").attr("disabled",false);
			}
        });

        return false;
    });

</script>