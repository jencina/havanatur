<?php
/* @var $this CategoriaMenuEventoController */
/* @var $data CategoriaMenuEvento */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cat_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cat_id), array('view', 'id'=>$data->cat_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cat_nombre')); ?>:</b>
	<?php echo CHtml::encode($data->cat_nombre); ?>
	<br />


</div>