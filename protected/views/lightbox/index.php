<?php
/* @var $this LightboxController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lightboxes',
);

$this->menu=array(
	array('label'=>'Create Lightbox', 'url'=>array('create')),
	array('label'=>'Manage Lightbox', 'url'=>array('admin')),
);
?>

<h1>Lightboxes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
