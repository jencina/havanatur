<?php
    $this->breadcrumbs = array('Eventos Academicos','Noticias'=>array('site/noticias'),$noticia->not_titulo);
    $this->widthPageClass = 'news-body';
    $this->headerTitulo = $noticia->not_titulo;
    $this->headerImagen = $noticia->not_imagen_detail;
?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="font-size: 18px;color:#898989;padding: 20px 25px">
        <?php echo $noticia->not_contenido?>
</div>
