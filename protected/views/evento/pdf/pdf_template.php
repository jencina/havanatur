<div class="titulo" style="margin-bottom: 50px;background-color: #F2F2F2">
    <img style="width: 130px;height:130px;margin:20px 0 0 20px;float: left" src="<?php echo Yii::app()->request->baseUrl;?>/images/logo-havana2.png" />
    <div style="float: left;width: 650px;text-align: center">
        <span style="font-size: 38px;font-weight: bold"><?php echo $model->even_titulo;?></span><br>
        <span style="font-size: 25px">Desde usd <?php echo $model->even_subtitulo;?></span>
    </div>
</div>

<div id="callout-glyphicons-location" style="border-bottom: 1px solid #6b7279;margin-bottom: 10px">
    <h4 style="margin-bottom: 3px">Consultas</h4>
</div>

<ul style="font-size: 12px;color:#6b7279;">
    <li><i class="fa fa-envelope"></i><?php echo $model->even_email?></li>
    <li><i class="fa fa-phone-square"></i><?php echo $model->even_telefono_1?></li>
    <li><i class="fa fa-phone-square"><?php echo $model->even_telefono_2?></li>
</ul>

<div id="callout-glyphicons-location" style="border-bottom: 1px solid #6b7279;margin-bottom: 10px">
    <h4 style="margin-bottom: 3px">Contenido</h4>
</div>

<?php echo $model->even_contenido;?>





