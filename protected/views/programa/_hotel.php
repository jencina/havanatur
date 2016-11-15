<div class="col-md-12 hotel">
    <input type="hidden" class="hotel" value="<?php echo $i?>">

    <div class="col-md-9">

        <?php
        echo $form->dropDownListGroup(
            $hotel,
            'hotel_id',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'widgetOptions' => array(
                    'data' => CHtml::listData(Hotel::model()->findAllByAttributes(array('ciudad_id'=>$ciudad)),'id', 'nombre'),
                    'htmlOptions'=>array('id'=>'Hotel_'.$i.'_hotel_id','name'=>'Hotel['.$i.'][hotel_id]','prompt'=>'Seleccione Hotel')
                )
            )
        ); ?>
    </div>
    <?php echo $form->hiddenField($hotel, 'id',array('name'=>'Hotel['.$i.'][id]')); ?>
    <input type="hidden" name="Hotel[<?php echo $i; ?>][ciudad_id]'" value="<?php echo $ciudad?>">

</div>