<div class="col-sm-4 col-md-3">
    <div class="thumbnail">

        <div id="gallery" data-toggle="modal-gallery" data-target="#modal-gallery" data-filter="*" >

            <a href="<?php echo Yii::app()->request->baseUrl.'/images/programa/'.$data->imagen;?>" title="<?php echo $data->imagen?>" data-gallery>
                <img src="<?php echo Yii::app()->request->baseUrl.'/images/programa/'.$data->imagen;?>" alt="<?php echo $data->imagen?>">
            </a>

        </div>

        <div class="caption">

                <?php echo CHtml::ajaxLink("Eliminar Foto",array("programa/FotoDelete","id"=>$data->id),array(
                    //"beforeSend" => 'js:function(){if(confirm("Estas seguro de eliminar la imagen?"))return true;}',
                    "success"=>'js:function(data){$.fn.yiiListView.update("datos",{});}',
                    "type"=>"post",
                ),array("id"=>$data->id,'class'=>'btn btn-danger','style'=>'width:100%;')); ?>
        </div>
    </div>
</div>


