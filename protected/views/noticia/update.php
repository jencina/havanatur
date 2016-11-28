<?php
/* @var $this NoticiaController */
/* @var $model Noticia */

$this->breadcrumbs=array(
	'Noticias'=>array('index'),
	$model->not_id=>array('view','id'=>$model->not_id),
	'Update',
);

?>
<h1>Update Noticia <?php echo $model->not_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>