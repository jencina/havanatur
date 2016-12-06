
<?php
$this->breadcrumbs = array($model->contenidoTipo->nombre,$model->titulo);

?>

<div class="page-header-detail" style="margin-top: 20px;margin-bottom: 20px">
    <h1>
        <?php echo strtoupper($model->titulo);?>
    </h1>
</div>

<?php if($top == true):?>
<div id="contenido" class="col-md-12">
    <div class="contenido" style="margin-bottom: 20px">

        <?php
            if($top_model->contenido_adicional_tipo_id == 1){ //conteido
                echo $top_model->contenido;
            }else if($top_model->contenido_adicional_tipo_id == 2){ //imagen
                $imagenes = array();
                if(count($top_model->contenidoFotos)>0){
                foreach($top_model->contenidoFotos as $imagen){
                    $imagenes[] = array(
                        'image' => Yii::app()->request->baseUrl.'/images/contenidoAdicional/'.$imagen->foto
						
                    );
                }
                $this->widget(
                    'booster.widgets.TbCarousel',
                    array(
                        'items' => $imagenes,
                    )
                );
                }
            }else if($top_model->contenido_adicional_tipo_id == 3){ //mapa ?>
                <iframe src="<?php echo $top_model->mapa?>" style="width: 100%;height: 350px"></iframe>
            <?php } ?>
    </div>
</div>
<?php endif;?>

<div id="contenido" class="col-md-<?php echo ($right == true)?'6':'12';?>">
    <div class="contenido" style="">
        <?php echo $model->contenido?>
    </div>
</div>

<?php if($right == true):?>
<div id="contenido" class="col-md-6">
    <div class="contenido">
        <?php
        if($right_model->contenido_adicional_tipo_id == 1){ //conteido
            echo $right_model->contenido;
        }else if($right_model->contenido_adicional_tipo_id == 2){ //imagen
            $imagenes = array();
            if(count($right_model->contenidoFotos)>0){
            foreach($right_model->contenidoFotos as $imagen){
                $imagenes[] = array(
                    //'image' => Yii::app()->request->baseUrl.'/images/contenidoAdicional/'.$imagen->foto
					 'div' => '<div style="background-image: url('."'".Yii::app()->request->baseUrl.'/images/contenidoAdicional/'.$imagen->foto."'".')"></div>'
                );
            }
            $this->widget(
                'booster.widgets.TbCarousel',
                array(
                    'items' => $imagenes,
                )
            );
            }
        }else if($right_model->contenido_adicional_tipo_id  == 3){  ?>
            <iframe src="<?php echo $right_model->mapa?>" style="width: 100%;height: 350px"></iframe>
        <?php } ?>

    </div>
</div>
<?php endif;?>

<?php if($bottom == true):?>
    <div id="contenido" class="col-md-12">
        <div class="contenido">
            <?php
            if($bottom_model->contenido_adicional_tipo_id == 1){ //conteido
                echo $bottom_model->contenido;
            }else if($bottom_model->contenido_adicional_tipo_id == 2){ //imagen
                $imagenes = array();
                if(count($bottom_model->contenidoFotos)>0){
                    foreach($bottom_model->contenidoFotos as $imagen){
                        $imagenes[] = array(
                            'image' => Yii::app()->request->baseUrl.'/images/contenidoAdicional/'.$imagen->foto
                        );
                    }
                    $this->widget(
                        'booster.widgets.TbCarousel',
                        array(
                            'items' => $imagenes,
                        )
                    );
                }

            }else if($bottom_model->contenido_adicional_tipo_id  == 3){  ?>
                <iframe src="<?php echo $bottom_model->mapa?>" style="width: 100%;height: 350px"></iframe>
            <?php } ?>

        </div>
    </div>
<?php endif;?>