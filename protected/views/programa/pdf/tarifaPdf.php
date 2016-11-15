
<?php
$ocupacion = '150';
$vig       = '200';
$otro      = '50';

?>
<table class="table table-bordered table-striped">

    <tr>
        <th width="<?php echo $ocupacion?>"><div class="padding-5">Ocupacion</div></th>

        <th width="<?php echo $vig?>">Vigencia</th>

        <th width="<?php echo $otro?>">DBL</th>
        <th width="<?php echo $otro?>">SGL</th>
        <th width="<?php echo $otro?>">TPL</th>
        <th width="<?php echo $otro?>">CHD</th>

        <th width="<?php echo $otro?>">DBL</th>
        <th width="<?php echo $otro?>">SGL</th>
        <th width="<?php echo $otro?>">TPL</th>
        <th width="<?php echo $otro?>">CHD</th>
    </tr>
    <tr>
        <td width="200">
           <?php echo $data->ocupacion?>
        </td>

        <td colspan="9">
            <?php
            foreach($data->programaCombinacionVigencias as $vigencia){
                $this->renderPartial('application.views.programa.pdf._tarifaPdf',array('vigencia'=>$vigencia,'vig'=>$vig,'otro'=>$otro));
            }
            ?>
        </td>
    </tr>
</table>



