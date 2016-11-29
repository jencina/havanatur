<style>
    .related-news-ctn:hover{
        background-size: 200% auto;
        transition: all 1.3s ease-in 0s;
    }
    
    .related-news-ctn {
    background-size: 180% auto;
}
.related-news-ctn {
    background-color: #f0f0f0;
    background-position: center center;
    background-repeat: no-repeat;
    margin-bottom: 15px;
    min-height: 230px;
     max-height: 230px;
    transition: all 0.3s ease-out 0s;
    width: 100%;
}
.related-news-ctn-filter {
    background-color: rgba(0, 0, 0, 0.4);
    min-height: 230px;
    padding-bottom: 10px;
    transition: all 0.3s ease-out 0s;
    width: 100%;
}

.related-news-ctn-filter:hover {
    background-color: rgba(0, 0, 0, 0.6);
}

.related-news-ctn-filter > div {
    padding: 2px 12px 5px;
}

.related-news-ctn a{
    color: #ffffff;
    text-decoration: none;
     font-size: 24px;
     font-weight: 800;
}
.related-news-ctn span:last-child {
    color: #e7e7e7;
    display: inherit;
    font-family: "ARSMaquettePro-light",Helvetica,Arial,sans-serif;
    font-size: 12px;
}

.news-label {
    background-color: #ca070b;
    color: #ffffff;
    display: inline-block;
    font-family: "ARSMaquettePro-Bold",Helvetica,Arial,sans-serif;
    font-size: 14px;
    font-weight: 800;
    padding: 10px 20px;
    position: relative;
    text-align: center;
    text-transform: uppercase;
    z-index: 1;
}
</style>


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

