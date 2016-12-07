


<div class="">
    <div class="related-news-ctn" style="background-image: url(<?php echo Yii::app()->request->baseUrl.'/images/eventos/'.$this->img_350_150($evento->even_imagen);?>);">
        <div class="related-news-ctn-filter">
            <span class="news-label innovation-news-label"><?php echo $evento->evenCat->cat_nombre?></span>
            <div>
                <?php echo CHtml::link($evento->even_titulo,array('site/eventoDetalle','id'=>$evento->even_id),array('class'=>'cotizar')); ?>
                <span class="date-display-single" content="2016-10-24T15:30:00-03:00" datatype="xsd:dateTime" property="dc:date">Octubre 24, 2016</span>
            </div>
        </div>
    </div>
</div>        

