<?php
    $this->breadcrumbs =   array('Eventos Academicos','Eventos de '.$categoria->cat_nombre);
    $this->headerTitulo = 'Eventos de '.$categoria->cat_nombre;
?>

<style>
    
    #eventos .items .noticia .thumbnail:hover{
      box-shadow: 0px 0px 8px 0px #000
        
    }
    
    #eventos .items .noticia .thumbnail a{
        width: 100%;
        text-transform: uppercase;
        font-weight: 800;
        font-family: "ARSMaquettePro-bold",Helvetica,Arial,sans-serif;
        font-size: 15px;
        cursor: pointer;
        text-decoration: none;
    }
    
</style>

<?php

$this->widget('zii.widgets.CListView', array(
    'id'=>'eventos',
    'dataProvider'=>$dataProvider,
    'itemView'=>'_eventos', 
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
                'eventos',{
                    data: {id:id}
                }
        );
    }
</script>

