
<div id="vigencia<?php echo $vigencia->id;?>" class="col-md-12 combi-price" style="margin-bottom: 10px">
        <div class="col-md-2 title btn-success">
            <?php echo $vigencia->desde; ?> al <?php echo $vigencia->hasta; ?>
        </div>
		
		<?php if($data->programa->chd2 == 1){
			$css = 2;
		}else{
			$css = 3;
		}?>
		
        <?php foreach($vigencia->tarifas as $tarifa){ ?>

            <div class="col-md-3 btn-info">
                <div class="col-md-12">
                    <div class="col-xs-<?php echo $css;?>"><?php echo 'dbl';?></div>
                    <div class="col-xs-<?php echo $css;?>"><?php echo 'sgl';?></div>
                    <div class="col-xs-<?php echo $css;?>"><?php echo 'tpl';?></div>
					<div class="col-xs-<?php echo $css;?>"><?php echo 'chd';?></div>
                    <?php if($css == 2):?>	
					<div class="col-xs-<?php echo $css;?>"><?php echo 'chd2';?></div>
					<?php endif;?>
                </div>
				
                <div class="col-md-12">
                    <div class="col-xs-<?php echo $css;?>"><?php echo $tarifa->dbl;?></div>
                    <div class="col-xs-<?php echo $css;?>"><?php echo $tarifa->sgl;?></div>
                    <div class="col-xs-<?php echo $css;?>"><?php echo $tarifa->tpl;?></div>
                    <div class="col-xs-<?php echo $css;?>"><?php echo $tarifa->chd;?></div>
					<?php if($css == 2):?>	
					<div class="col-xs-<?php echo $css;?>"><?php echo $tarifa->chd2;?></div>
					<?php endif;?>
                </div>
            </div>
        <?php }?>
        <div class="col-md-1 btn-danger">
            <?php echo CHtml::link('<i class="fa fa-trash-o"></i>','',array('onclick'=>'js:bootbox.confirm("desea eliminar",function(e){eliminarTarifa('.$vigencia->id.')})'  ));?>
			<?php echo CHtml::link('<i class="fa fa-edit"></i>','',array('onclick'=>'js:editarTarifa('.$vigencia->id.')'));?>
        </div>
    </div>