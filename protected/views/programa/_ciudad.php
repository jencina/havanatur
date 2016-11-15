<div class="col-md-12 ciudad">
    <input type="hidden" class="ciudad" value="<?php echo $i?>">

    <div class="col-md-9">
    <?php
        echo $form->dropDownListGroup(
            $ciudad,
            'ciudad_id',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'widgetOptions' => array(
                    'data' => CHtml::listData(Ciudad::model()->findAll(),'id', 'nombre'),
                    'htmlOptions'=>array('id'=>'ProgramaHasCiudad_'.$i.'_ciudad_id','name'=>'ProgramaHasCiudad['.$i.'][ciudad_id]','prompt'=>'Seleccione Tipo')
                )
            )
        );
    ?>
    </div>
    <?php echo $form->hiddenField($ciudad, 'id',array('name'=>'ProgramaHasCiudad['.$i.'][id]')); ?>
    <?php if($i > 0){?>
        <div class="col-md-3">
            <?php echo CHtml::link('eliminar','',array('style'=>'margin-top:25px;','class'=>'btn btn-danger','onclick'=>'$(this).parents(".ciudad").remove()')); ?>
        </div>
    <?php }?>
</div>