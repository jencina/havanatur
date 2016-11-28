<?php
/* @var $this NoticiaController */
/* @var $data Noticia */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('not_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->not_id), array('view', 'id'=>$data->not_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('not_titulo')); ?>:</b>
	<?php echo CHtml::encode($data->not_titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('not_subtitulo')); ?>:</b>
	<?php echo CHtml::encode($data->not_subtitulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('not_contenido')); ?>:</b>
	<?php echo CHtml::encode($data->not_contenido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('not_imagen')); ?>:</b>
	<?php echo CHtml::encode($data->not_imagen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('not_fecha')); ?>:</b>
	<?php echo CHtml::encode($data->not_fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('not_fechacreacion')); ?>:</b>
	<?php echo CHtml::encode($data->not_fechacreacion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('not_fechamodificacion')); ?>:</b>
	<?php echo CHtml::encode($data->not_fechamodificacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_id')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_id); ?>
	<br />

	*/ ?>

</div>