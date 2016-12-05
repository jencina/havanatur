<?php
/* @var $this EventoController */
/* @var $data Evento */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('even_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->even_id), array('view', 'id'=>$data->even_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('even_titulo')); ?>:</b>
	<?php echo CHtml::encode($data->even_titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('even_subtitulo')); ?>:</b>
	<?php echo CHtml::encode($data->even_subtitulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('even_contenido')); ?>:</b>
	<?php echo CHtml::encode($data->even_contenido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('even_imagen')); ?>:</b>
	<?php echo CHtml::encode($data->even_imagen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('even_imagen_detail')); ?>:</b>
	<?php echo CHtml::encode($data->even_imagen_detail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('even_fecha')); ?>:</b>
	<?php echo CHtml::encode($data->even_fecha); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('even_fechacreacion')); ?>:</b>
	<?php echo CHtml::encode($data->even_fechacreacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('even_fechamodificacion')); ?>:</b>
	<?php echo CHtml::encode($data->even_fechamodificacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('even_destacado')); ?>:</b>
	<?php echo CHtml::encode($data->even_destacado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('even_activo')); ?>:</b>
	<?php echo CHtml::encode($data->even_activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_id')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('even_email')); ?>:</b>
	<?php echo CHtml::encode($data->even_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('even_telefono_1')); ?>:</b>
	<?php echo CHtml::encode($data->even_telefono_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('even_telefono_2')); ?>:</b>
	<?php echo CHtml::encode($data->even_telefono_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('even_cat_id')); ?>:</b>
	<?php echo CHtml::encode($data->even_cat_id); ?>
	<br />

	*/ ?>

</div>