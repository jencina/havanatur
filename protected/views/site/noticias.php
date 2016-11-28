<?php
    $this->breadcrumbs =   array('Eventos Academicos','Noticias');
    $this->headerTitulo = 'Noticias';
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
    
</style>

<div id="filtro-noticias" class="col-md-12">
    <?php echo CHtml::link('Todos','',array('class'=>'','onclick'=>'js:filterNoticias(0);'));?>
    <?php foreach ($categorias as $cat){ ?>
        <?php echo CHtml::link($cat->cat_nombre,'',array('class'=>'','onclick'=>'js:filterNoticias('.$cat->cat_id.');'));?>
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
        console.log(id);
        $.fn.yiiListView.update(
                'noticias',{
                    data: {id:id}
                }
        );
    }
</script>

