
<div class="titulo" style="margin-bottom: 50px">
    <img style="width: 150px;height:150px;float: left" src="<?php echo Yii::app()->request->baseUrl;?>/images/logo-havana2.png" />
        <div style="float: left;width: 650px;text-align: center">
            <span style="font-size: 38px;font-weight: bold"><?php echo $model->nombre; ?></span><br>
            <span style="font-size: 25px">Desde usd <?php echo $model->precio_desde;?> en dbl p/p</span>
        </div>
</div>


<div id="callout-glyphicons-location" style="border-bottom: 1px solid #6b7279;margin-bottom: 10px">
    <h4 style="margin-bottom: 3px">Incluye</h4>
</div>
<?php
      echo $this->renderPartial('application.views.programa.pdf2._incluye',array('incluye'=>$incluye),true);
?>

<div id="callout-glyphicons-location" style="border-bottom: 1px solid #6b7279;margin-bottom: 10px">
    <h4 style="margin-bottom: 3px">Tarifa</h4>
</div>

    <table width="1300" class="table table-bordered" style="font-size: 12px;text-align: center">
        <tr>
            <th style="border: 0 !important;"></th>
            <th style="border: 0 !important;"></th>
            <th style="border: 0 !important;"></th>
            <th style="border: 0 !important;"></th>
            <?php foreach($model->ciudads as $ciudad){ ?>
                <th style="background-color:#002575;font-size: 12px;text-align: center;color:#fff;padding:5px;">NTS ADC. <?php echo  $ciudad->ciudad->codigo?></th>
            <?php } ?>
        </tr>
        <tr style="background-color:#002575;">
            <th width="100" style="background-color:#002575;font-size: 12px;text-align: center;color:#fff;padding:5px;">Hotel</th>
            <th width="100" style="background-color:#002575;font-size: 12px;text-align: center;color:#fff;padding:5px;">Ocupacion</th>
            <th width="170" style="background-color:#002575;font-size: 12px;text-align: center;color:#fff;padding:5px;">Vigencia</th>
            <th style="background-color:#002575;font-size: 12px;text-align: center;color:#fff;">
			<?php if($model->chd2 == 1){
				$css = 20;
			}else{
				$css = 25;
			}?>
                    <table style="width: 100%" border="0">
                        <tr>
                            <th  style="background-color:#002575;width: <?php echo $css?>%;text-align: center;color:#fff;padding:5px;">dbl</th>
                            <th  style="background-color:#002575;width: <?php echo $css?>%;text-align: center;color:#fff;padding:5px;">sgl</th>
                            <th  style="background-color:#002575;width: <?php echo $css?>%;text-align: center;color:#fff;padding:5px;">tpl</th>
                            <th  style="background-color:#002575;width: <?php echo $css?>%;text-align: center;color:#fff;padding:5px;">chd</th>
							<?php if($model->chd2 == 1){?>
								<th  style="background-color:#002575;width: <?php echo $css?>%;text-align: center;color:#fff;padding:5px;">chd2</th>
							<?php } ?>
                        </tr>
                    </table>
			</th>
            <?php foreach($model->ciudads as $ciudad){ ?>
                <th style="background-color:#002575;font-size: 12px;text-align: center">
                    <table style="width: 100%">
                        <tr>
                            <th  style="background-color:#002575;width: <?php echo $css?>%;text-align: center;color:#fff;padding:5px;">dbl</th>
                            <th  style="background-color:#002575;width: <?php echo $css?>%;text-align: center;color:#fff;padding:5px;">sgl</th>
                            <th  style="background-color:#002575;width: <?php echo $css?>%;text-align: center;color:#fff;padding:5px;">tpl</th>
                            <th  style="background-color:#002575;width: <?php echo $css?>%;text-align: center;color:#fff;padding:5px;">chd</th>
							<?php if($model->chd2 == 1){?>
								<th  style="background-color:#002575;width: <?php echo $css?>%;text-align: center;color:#fff;padding:5px;">chd2</th>
							<?php } ?>
                        </tr>
                    </table>
                </th>
           <?php } ?>
        </tr>
        <?php foreach($combi as $data):
            echo $this->renderPartial('application.views.programa.pdf2._combiPdf',array('data'=>$data,'model'=>$model,'css'=>$css),true);
        endforeach;?>
    </table>

<div id="callout-glyphicons-location" style="border-bottom: 1px solid #6b7279;margin-bottom: 10px">
    <h4 style="margin-bottom: 3px">Suplemento Aereo</h4>
</div>
    <?php
    echo $this->renderPartial('application.views.programa.pdf2._suplemento',array('incluye'=>$suplemento),true);
    ?>

<div id="callout-glyphicons-location" style="border-bottom: 1px solid #6b7279;margin-bottom: 10px">
    <h4 style="margin-bottom: 3px">Programa No Incluye (Valores No Comisionables)</h4>
</div>
    <?php
    echo $this->renderPartial('application.views.programa.pdf2._noIncluye',array('incluye'=>$noIncluye),true);
    ?>

<div id="callout-glyphicons-location" style="border-bottom: 1px solid #6b7279;margin-bottom: 10px">
    <h4 style="margin-bottom: 3px">Condiciones Generales</h4>
</div>
<?php
echo $this->renderPartial('application.views.programa.pdf2._condiciones',array('condiciones'=>$condiciones),true);
?>



