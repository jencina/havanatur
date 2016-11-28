<?php
/* @var $this NoticiaController */
/* @var $model Noticia */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'not_id'); ?>
		<?php echo $form->textField($model,'not_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_titulo'); ?>
		<?php echo $form->textField($model,'not_titulo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_subtitulo'); ?>
		<?php echo $form->textField($model,'not_subtitulo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_contenido'); ?>
		<?php echo $form->textArea($model,'not_contenido',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_imagen'); ?>
		<?php echo $form->textField($model,'not_imagen',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_fecha'); ?>
		<?php echo $form->textField($model,'not_fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_fechacreacion'); ?>
		<?php echo $form->textField($model,'not_fechacreacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_fechamodificacion'); ?>
		<?php echo $form->textField($model,'not_fechamodificacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuario_id'); ?>
		<?php echo $form->textField($model,'usuario_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->