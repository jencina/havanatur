

    <ul class="nav nav-tabs" role="tablist" style="background-color: #fff">
        <?php foreach($model->hotels as $index=>$hotel):?>
            <li role="presentation" <?php echo ($index==0)?'class="active"':''?> ><a href="#hotel<?php echo $model->id.'-'.$hotel->id?>" aria-controls="hotel<?php echo $model->id.'-'.$hotel->id?>" role="tab" data-toggle="tab"><?php echo $hotel->nombre?></a></li>
        <?php endforeach;?>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <?php foreach($model->hotels as $index=>$hotel):?>
            <div role="tabpanel" class="tab-pane <?php echo ($index==0)?'active':''?>" id="hotel<?php echo $model->id.'-'.$hotel->id; ?>"><?php $this->renderPartial('_combi',array('id'=>$model->id,'hotel'=>$hotel));?></div>
        <?php endforeach;?>
    </div>

    <?php $meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');?>
    <?php foreach($model->programaCombinacionVigencias as $vigencia): ?>
        <div class="col-md-12 combi-price" style="font-size: 11px;">
            <div class="col-md-12 title">
                <?php echo date("d",strtotime($vigencia->desde)).' ',$meses[(date("n",strtotime($vigencia->desde))-1)].' '.date("Y",strtotime($vigencia->desde));?>
                al
                <?php echo date("d",strtotime($vigencia->hasta)).' ',$meses[(date("n",strtotime($vigencia->hasta))-1)].' '.date("Y",strtotime($vigencia->hasta));?>
				<?php echo $vigencia->comentario;?>
				<a class="btn btn-success" onclick="js:cotizar(<?php echo $vigencia->id?>,'open')">Cotizar</a>
			</div>

            <div id="tarifa-table" style="float: left;width: 100%;max-width:100%;" class="table-responsive">				
				<table class="table table-bordered" style="font-size: 10px;text-align: center">
					<tr class="btn-primary">
						<?php foreach($vigencia->tarifas as $index=>$tarifas):?>
									<td colspan="<?php echo ($model->programa->chd2==1)?'5':'4'?>">
										<?php if($index == 0){
											echo '<b>TARIFA</b>';
										}else{
											$hotel = $model->hotels[$index-1];
											echo '<b>NTS ADC. '.$hotel->ciudad->codigo.'</b>';
										}?>
									</td>
						<?php endforeach;?>
					</tr>
					<tr class="btn-info">
						<?php foreach($vigencia->tarifas as $index=>$tarifas):?>
									<td>SGL</td>
									<td>DBL</td>
									<td>TRL</td>
									<td>CHD</td>
									<?php if($model->programa->chd2==1):?>
									<td>CHD2</td>
									<?php endif;?>
						<?php endforeach;?>
					</tr>
					<tr>
						<?php foreach($vigencia->tarifas as $index=>$tarifas):?>
								
									<td class="col-xs-3"><?php echo $tarifas->sgl?></td>
									<td class="col-xs-3"><?php echo $tarifas->dbl?></td>
									<td class="col-xs-3"><?php echo $tarifas->tpl?></td>
									<td class="col-xs-3"><?php echo $tarifas->chd?></td>
									<?php if($model->programa->chd2==1):?>
									<td class="col-xs-3"><?php echo $tarifas->chd2?></td>
									<?php endif;?>
							   
						<?php endforeach;?>
					 </tr>
                </table> 

            </div>
        </div>

    <?php endforeach; ?>


    <script>


	$('#myTabs a').click(function (e) {
		e.preventDefault()
		$(this).tab('show')
	})
    </script>

