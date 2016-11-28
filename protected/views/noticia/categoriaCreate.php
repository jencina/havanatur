<?php
$this->breadcrumbs=array(
	'Noticias'=>array('index'),
	'Create',
);

?>

<div class="page-header">
    <h1>Categoria <small>Crear Nuevo</small></h1>
</div>


<?php $this->renderPartial('_categoriaForm', array('model'=>$model)); ?>