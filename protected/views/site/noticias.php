<?php
    $this->breadcrumbs =   array('Eventos Academicos','Noticias');
    $this->headerTitulo = 'Noticias';
    $this->headerImagen = '';
?>

<style>
    
    #noticias .items .noticia .thumbnail:hover{
      box-shadow: 0px 0px 8px 0px #000
        
    }
    
    #noticias .items .noticia .thumbnail a{
        width: 100%;
        text-transform: uppercase;
        font-weight: 800;
        font-family: "ARSMaquettePro-bold",Helvetica,Arial,sans-serif;
        font-size: 15px;
        cursor: pointer;
        text-decoration: none;
    }
    
    #filtro-noticias a.active{
        background-color: #ca070b;
        color: #8c0a0a;
    }
</style>

<div id="filtro-noticias" class="col-md-12">
    <?php echo CHtml::link('Todos','',array('id'=>'0','class'=>'active','onclick'=>'js:filterNoticias(0);'));?>
    <?php foreach ($categorias as $cat){ ?>
        <?php echo CHtml::link($cat->cat_nombre,'',array('id'=>$cat->cat_id,'onclick'=>'js:filterNoticias('.$cat->cat_id.');'));?>
    <?php } ?>
</div>


<?php

$this->widget('zii.widgets.CListView', array(
    'id'=>'noticias',
    'dataProvider'=>$dataProvider,
    'itemView'=>'_noticias', 
    'template'=>'{items}',
    'sortableAttributes'=>array(
        'not_titulo',
    ),
));

?>


<script>
    function filterNoticias(id){
        $("#filtro-noticias a").attr("class","");
        $("#"+id).attr("class","active");
        $.fn.yiiListView.update(
                'noticias',{
                    data: {id:id}
                }
        );
    }
</script>

