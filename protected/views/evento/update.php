<?php
/* @var $this NoticiaController */
/* @var $model Noticia */

$this->breadcrumbs=array(
	'Evento'=>array('index'),
	$model->even_id=>array('view','id'=>$model->even_id),
	'Update',
);

?>
<h1>Update Noticia <?php echo $model->even_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>