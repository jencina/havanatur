<div class="col-sm-4 col-md-3">
    <div class="thumbnail">

        <div id="gallery" data-toggle="modal-gallery" data-target="#modal-gallery" data-filter="*" >

            <a href="<?php echo Yii::app()->request->baseUrl.'/images/contenidoAdicional/'.$data->foto;?>" title="<?php echo $data->foto?>" data-gallery>
                <img src="<?php echo Yii::app()->request->baseUrl.'/images/contenidoAdicional/'.$data->foto;?>" alt="<?php echo $data->foto?>">
            </a>

        </div>

        <div class="caption">

            <?php echo CHtml::ajaxLink("Eliminar Foto",array("contenido/imagenAdicionalDelete","id"=>$data->id),array(
                "beforeSend" => 'js:function(){if(confirm("Estas seguro de eliminar la imagen?"))return true;}',
                "success"=>'js:function(data){$.fn.yiiListView.update("datos",{});}',
                "type"=>"post",
            ),array("id"=>$data->id,'class'=>'btn btn-danger','style'=>'width:100%;')); ?>
        </div>
    </div>
</div>
