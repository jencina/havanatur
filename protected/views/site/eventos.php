<?php
    $this->breadcrumbs =   array('Eventos Academicos','Eventos de '.$categoria->cat_nombre);
    $this->headerTitulo = 'Eventos de '.$categoria->cat_nombre;
?>

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

