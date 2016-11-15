
<table width="900" class="table-bordered">
    <tr>
        <td width="<?php echo $vig?>">
            <?php echo $vigencia->desde; ?> al <?php echo $vigencia->hasta; ?>
        </td>
        <?php foreach($vigencia->tarifas as $tarifa){ ?>
            <td width="<?php echo $otro?>"><?php echo $tarifa->dbl;?></td>
            <td width="<?php echo $otro?>"><?php echo $tarifa->sgl;?></td>
            <td width="<?php echo $otro?>"><?php echo $tarifa->tpl;?></td>
            <td width="<?php echo $otro?>"><?php echo $tarifa->chd;?></td>
        <?php }?>
    </tr>

</table>