<?php
    $this->breadcrumbs = array('Eventos Academicos','Noticias'=>array('site/noticias'),$noticia->not_titulo);
    $this->widthPageClass = 'news-body';
    $this->headerTitulo    = $noticia->not_titulo;
    $this->headerCategoria = $noticia->categoriaCat->cat_nombre;
    $this->headerFecha     = ($noticia->not_fecha == '0000-00-00')?date("F d,Y",strtotime($noticia->not_fechacreacion)):date("F d,Y",strtotime($noticia->not_fecha));
    $this->headerImagen    = $noticia->not_imagen_detail;
?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="font-size: 18px;color:#898989;padding: 20px 25px">
        <?php echo $noticia->not_contenido?>
</div>
