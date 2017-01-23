
<?php

$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'homeLink' => CHtml::link('Home',array('site/index')),
        //'links' => array($model->nombre)
		 'links' => array('Nuestra Empresa','Nuestro Equipo')
    )
);

?>

<?php if(count($gerencia)>0):?>
<div class="page-header-detail">
    <h1>GERENCIA</h1>
</div>

<div class="col-md-12">
    <?php foreach($gerencia as $ger):?>
        <div class="col-sm-4 col-md-3">
            <div class="thumbnail">
                <div class="img" style="width:200px;background-position:center;border: 2px solid #ddd;border-radius:100%;background-image:url(<?php echo Yii::app()->request->baseUrl;?>/images/equipo/<?php echo (!empty($ger->foto))?$ger->foto:'../error/image-not-found.png'?>);"></div>
				<div class="caption" STYLE="text-align: center">
                    <a class="product-name"><?php echo $ger->cargo?></a>
                    <P><?php echo $ger->nombre?></P>
                    <P><?php echo $ger->email?></P>
                    <P><?php echo 'Anexo '.$ger->anexo?></P>

                </div>
            </div>
        </div>
    <?php endforeach;?>
</div>

<?php endif;?>

<?php if(count($ventas)>0):?>
<div class="page-header-detail">
    <h1>
        COMERCIAL Y VENTAS
        <small></small>
    </h1>
</div>

<div class="col-md-12">
    <?php foreach($ventas as $venta):?>
        <div class="col-sm-4 col-md-3">
            <div class="thumbnail">
                <div class="img" style="width:200px;background-position:center;border: 2px solid #ddd;border-radius:100%;background-image:url(<?php echo Yii::app()->request->baseUrl;?>/images/equipo/<?php echo (!empty($venta->foto))?$venta->foto:'../error/image-not-found.png'?>);"></div><div class="caption" STYLE="text-align: center">
                    <a class="product-name"><?php echo $venta->cargo?></a>
                    <P><?php echo $venta->nombre?></P>
                    <P><?php echo $venta->email?></P>
                    <P><?php echo 'Anexo '.$venta->anexo?></P>

                </div>
            </div>
        </div>
    <?php endforeach;?>
</div>
<?php endif;?>

<?php if(count($marketing)>0):?>
<div class="page-header-detail">
    <h1>
        PROMOCION-MARKETING
        <small></small>
    </h1>
</div>

<div class="col-md-12">
    <?php foreach($marketin as $mar):?>
        <div class="col-sm-4 col-md-3">
            <div class="thumbnail">
                <div class="img" style="width:200px;background-position:center;border: 2px solid #ddd;border-radius:100%;background-image:url(<?php echo Yii::app()->request->baseUrl;?>/images/equipo/<?php echo (!empty($mar->foto))?$mar->foto:'../error/image-not-found.png'?>);"></div><div class="caption" STYLE="text-align: center">
                    <a class="product-name"><?php echo $mar->cargo?></a>
                    <P><?php echo $mar->nombre?></P>
                    <P><?php echo $mar->email?></P>
                    <P><?php echo 'Anexo '.$mar->anexo?></P>

                </div>
            </div>
        </div>
    <?php endforeach;?>
</div>
<?php endif;?>

<?php if(count($operaciones)>0):?>
<div class="page-header-detail">
    <h1>
        OPERACIONES
        <small></small>
    </h1>
</div>

<div class="col-md-12">
    <?php foreach($operaciones as $operacion):?>
        <div class="col-sm-4 col-md-3">
            <div class="thumbnail">
                <div class="img" style="width:200px;background-position:center;border: 2px solid #ddd;border-radius:100%;background-image:url(<?php echo Yii::app()->request->baseUrl;?>/images/equipo/<?php echo (!empty($operacion->foto))?$operacion->foto:'../error/image-not-found.png'?>);"></div>
                <div class="caption" STYLE="text-align: center">
                    <a class="product-name"><?php echo $operacion->cargo?></a>
                    <P><?php echo $operacion->nombre?></P>
                    <P><?php echo $operacion->email?></P>
                    <P><?php echo 'Anexo '.$operacion->anexo?></P>

                </div>
            </div>
        </div>
    <?php endforeach;?>
</div>
<?php endif;?>

<?php if(count($admin)>0):?>
<div class="page-header-detail">
    <h1>
        ADMINISTRACIÓN Y FINANZAS
        <small></small>
    </h1>
</div>

<div class="col-md-12">
    <?php foreach($admin as $ad):?>
        <div class="col-sm-4 col-md-3">
            <div class="thumbnail">
                
                <div class="img" style="width:200px;background-position:center;border: 2px solid #ddd;border-radius:100%;background-image:url(<?php echo Yii::app()->request->baseUrl;?>/images/equipo/<?php echo (!empty($ad->foto))?$ad->foto:'../error/image-not-found.png'?>);"></div>
				<div class="caption" STYLE="text-align: center">
                    <a class="product-name"><?php echo $ad->cargo?></a>
                    <P><?php echo $ad->nombre?></P>
                    <P><?php echo $ad->email?></P>
                    <P><?php echo 'Anexo '.$ad->anexo?></P>
                </div>
            </div>
        </div>
    <?php endforeach;?>
</div>
<?php endif;?>

<?php if(count($contabilidad)>0):?>
<div class="page-header-detail">
    <h1>
        CONTABILIDAD
        <small></small>
    </h1>
</div>

<div class="col-md-12">
    <?php foreach($contabilidad as $conta):?>
        <div class="col-sm-4 col-md-3">
            <div class="thumbnail">
               <!-- <img style="border: 2px solid #ddd;border-radius:100%;"src="<?php echo Yii::app()->request->baseUrl;?>/images/equipo/<?php echo (!empty($conta->foto))?$conta->foto:'../error/image-not-found.png'?>" alt="..."> -->
                <div class="img" style="width:200px;background-position:center;border: 2px solid #ddd;border-radius:100%;background-image:url(<?php echo Yii::app()->request->baseUrl;?>/images/equipo/<?php echo (!empty($conta->foto))?$conta->foto:'../error/image-not-found.png'?>);"></div>
				<div class="caption" STYLE="text-align: center">
                    <a class="product-name"><?php echo $conta->cargo?></a>
                    <P><?php echo $conta->nombre?></P>
                    <P><?php echo $conta->email?></P>
                    <P><?php echo 'Anexo '.$conta->anexo?></P>
                </div>
            </div>
        </div>
    <?php endforeach;?>
</div>
<?php endif;?>

<?php if(count($asistente)>0):?>
<div class="page-header-detail">
    <h1>
        ASISTENTE DE CALIDAD
        <small></small>
    </h1>
</div>

<div class="col-md-12">
    <?php foreach($asistente as $conta):?>
        <div class="col-sm-4 col-md-3">
            <div class="thumbnail">
			     <div class="img" style="width:200px;background-position:center;border: 2px solid #ddd;border-radius:100%;background-image:url(<?php echo Yii::app()->request->baseUrl;?>/images/equipo/<?php echo (!empty($conta->foto))?$conta->foto:'../error/image-not-found.png'?>);"></div>
                <div class="caption" STYLE="text-align: center">
                    <a class="product-name"><?php echo $conta->cargo?></a>
                    <P><?php echo $conta->nombre?></P>
                    <P><?php echo $conta->email?></P>
                    <P><?php echo 'Anexo '.$conta->anexo?></P>
                </div>
            </div>
        </div>
    <?php endforeach;?>
</div>
<?php endif;?>