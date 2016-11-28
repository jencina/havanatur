
<div class="combi col-md-12">
	<?php
		//print_r($data->getImagen());
		//exit;
	?>
    <!-- <div class="combi-image col-md-4" style="background-image:url(<?php echo Yii::app()->request->baseUrl;?>/images/<?php echo $data->getImagen();?>);background-position: 50% center; "> -->
    <div class="combi-image col-md-4" style="background-image:url('<?php echo Yii::app()->request->baseUrl.'/images/'.$data->getImagen();?>');background-position: 50% center; ">
	</div>

    <div class="combi-content col-md-8 description">
        <h4><?php echo $data->getNombre();?></h4>
        <div>
            <p><?php echo $data->descripcion?></p>
        </div>

        <div class="price">
            desde: <span class="new"> $<?php echo $data->precio_desde;?></span>
            <!-- <span class="old">$4000</span> -->
        </div>

        <div class="button-container col-md-12">

            <?php echo CHtml::link('<i class="fa fa-info"></i>','',array('class'=>'info','onclick'=>'js:getCombinacion('.$data->id.')'));?>

        </div>
    </div>
	
	

</div>

<div  id="collapse<?php echo $data->id?>" style="width:100%;max-width:100%;" class="page-detail-description collapse">
</div>


<!-- AKI VA _COMBI-->