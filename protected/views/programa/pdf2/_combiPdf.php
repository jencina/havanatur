
<?php
$hoteles = array();
$cont=0;
foreach($data->hotels as $hotel){
    $hoteles[] = $hotel->nombre;
    $cont++;
} ?>

<tr>
    <td style="background: #e02626;color:#fff;padding: 3px"><?php echo implode("-",$hoteles);?></td>
    <td style="background: #e02626;color:#fff;padding: 3px"> <?php echo $data->ocupacion?></td>

    <td>
        <table style="width: 100%">
            <?php foreach($data->programaCombinacionVigencias as $vigencia){ ?>
                <tr style="width: 100%;height: 37px !important;">
                    <td style="padding:3px 3px;height:37px !important;">
                        <?php $meses = array('Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic');?>
                        <?php echo date("d",strtotime($vigencia->desde)).' ',$meses[(date("n",strtotime($vigencia->desde))-1)].' '.date("Y",strtotime($vigencia->desde));?>
                        al
                        <?php echo date("d",strtotime($vigencia->hasta)).' ',$meses[(date("n",strtotime($vigencia->hasta))-1)].' '.date("Y",strtotime($vigencia->hasta));?>
						</br><?php echo $vigencia->comentario?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </td>

    <td>
        <table style="width: 100%">
            <?php foreach($data->programaCombinacionVigencias as $index=>$vigencia){ ?>
                <tr style="width: 100%;height: 37px !important;">

                    <td style="width: <?php echo $css?>%;height:37px !important;padding:3px;background:<?php echo (in_array($vigencia->tarifas[0]->dbl,array('','N/H',0,' ')))?'#ddd':'#fff';?>;" ><?php echo $vigencia->tarifas[0]->dbl;?></td>
                    <td style="width: <?php echo $css?>%;padding:3px;background:<?php echo (in_array($vigencia->tarifas[0]->sgl,array('','N/H',0,' ')))?'#ddd':'#fff';?>;" ><?php echo $vigencia->tarifas[0]->sgl;?></td>
                    <td style="width: <?php echo $css?>%;padding:3px;background:<?php echo (in_array($vigencia->tarifas[0]->tpl,array('','N/H',0,' ')))?'#ddd':'#fff';?>;" ><?php echo $vigencia->tarifas[0]->tpl;?></td>
                    <td style="width: <?php echo $css?>%;padding:3px;background:<?php echo (in_array($vigencia->tarifas[0]->chd,array('','N/H',0,' ')))?'#ddd':'#fff';?>;" ><?php echo $vigencia->tarifas[0]->chd;?></td>
					<?php if($model->chd2 == 1){?>
						<td style="width: <?php echo $css?>%;padding: 3px;background:<?php echo (in_array($vigencia->tarifas[0]->chd2,array('','N/H',0,' ')))?'#ddd':'#fff';?>;" ><?php echo (!empty($vigencia->tarifas[0]->chd2))?$vigencia->tarifas[0]->chd2:'N/H';?></td>
					<?php } ?>
                </tr>
            <?php } ?>
        </table>
    </td>

    <?php foreach ($hoteles as $index=>$hotel) { $count = $index+1;?>
        <td>
            <table style="width: 100%">
                <?php foreach($data->programaCombinacionVigencias as $vigencia){ ?>
                    <tr style="width: 100%;height: 37px !important;">

                        <td style="width: <?php echo $css?>%;height: 37px !important;padding:5px 3px;background:<?php echo (in_array($vigencia->tarifas[$count]->dbl,array('','N/H',0,' ')))?'#ddd':'#fff';?>;" ><?php echo $vigencia->tarifas[$count]->dbl;?></td>
                        <td style="width: <?php echo $css?>%;padding:5px 3px;background:<?php echo (in_array($vigencia->tarifas[$count]->sgl,array('','N/H',0,' ')))?'#ddd':'#fff';?>;" ><?php echo $vigencia->tarifas[$count]->sgl;?></td>
                        <td style="width: <?php echo $css?>%;padding:5px 3px;background:<?php echo (in_array($vigencia->tarifas[$count]->tpl,array('','N/H',0,' ')))?'#ddd':'#fff';?>;" ><?php echo $vigencia->tarifas[$count]->tpl;?></td>
                        <td style="width: <?php echo $css?>%;padding:5px 3px;background:<?php echo (in_array($vigencia->tarifas[$count]->chd,array('','N/H',0,' ')))?'#ddd':'#fff';?>;" ><?php echo $vigencia->tarifas[$count]->chd;?></td>
						<?php if($model->chd2 == 1){?>
						<td style="width: <?php echo $css?>%;padding:5px 3px;background:<?php echo (in_array($vigencia->tarifas[$count]->chd2,array('','N/H',0,' ')))?'#ddd':'#fff';?>;" ><?php echo (!empty($vigencia->tarifas[$count]->chd2))?$vigencia->tarifas[$count]->chd2:'N/H';?></td>
					<?php } ?>
                    </tr>
                <?php } ?>
            </table>
        </td>
    <?php } ?>

</tr>
