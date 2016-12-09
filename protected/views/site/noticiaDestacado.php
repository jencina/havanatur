
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
    <div class="related-news-ctn" style="background-image: url(<?php echo Yii::app()->request->baseUrl.'/images/noticias/'.$this->img_350_150($noticia->not_imagen);?>);">
        <div class="related-news-ctn-filter">
            <span class="news-label innovation-news-label"><?php echo $noticia->categoriaCat->cat_nombre?></span>
            <div>
                <?php echo CHtml::link($noticia->not_titulo,array('site/noticiaDetalle','id'=>$noticia->not_id),array('class'=>'cotizar')); ?>
                <span class="date-display-single" content="2016-10-24T15:30:00-03:00" datatype="xsd:dateTime" property="dc:date"> <?php echo ($noticia->not_fecha == '0000-00-00')?date("F d,Y",strtotime($noticia->not_fechacreacion)):date("F d,Y",strtotime($noticia->not_fecha));?> </span>
            </div>
        </div>
    </div>
</div>        

