<div class="noticia col-sm-6 col-md-4" style="padding-top: 40px">
    <div class="thumbnail">
        
        <img width="350" height="150" src="<?php echo Yii::app()->request->baseUrl.'/images/noticias/'.$this->img_350_150($data->not_imagen);?>" alt="...">
        
        <div class="caption">
            <h3 style="font-weight: 800;"><?php echo $data->not_titulo ?></h3>
            <p style="font-size: 15px"><?php echo $data->not_subtitulo ?></p>
            <p>
                
            <div class="button-container">
                <?php echo CHtml::link('LEER MAS',array('site/noticiaDetalle','id'=>$data->not_id),array('class'=>'cotizar')); ?>
            </div>  
                <!--<a href="#" class="btn btn-primary" role="button">Button</a>-->
            </p>
        </div>
    </div>
</div>
