
<div class="">
    <div class="related-news-ctn" style="background-image: url(<?php echo Yii::app()->request->baseUrl.'/images/noticias/'.$this->img_350_150($noticia->not_imagen);?>);">
        <div class="related-news-ctn-filter">
            <span class="news-label innovation-news-label"><?php echo $noticia->categoriaCat->cat_nombre?></span>
            <div>
                <?php echo CHtml::link($noticia->not_titulo,array('site/noticiaDetalle','id'=>$noticia->not_id),array('class'=>'cotizar')); ?>
                <span class="date-display-single" content="2016-10-24T15:30:00-03:00" datatype="xsd:dateTime" property="dc:date">Octubre 24, 2016</span>
            </div>
        </div>
    </div>
</div>        

