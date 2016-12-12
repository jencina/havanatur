<?php
$this->breadcrumbs   = array('Contenido'=>array('contenido/admin'),'Adicional',$model->contenido0->titulo=>array('contenido/adicional','id'=>$model->contenido0->id),'Detalle');
$this->pagetitulo    = 'Contenido Adicional';
$this->pagesubtitulo = 'Detalle '.$model->contenido0->titulo;
//$this->btncreate     = CHtml::link('Nuevo',array('contenido/createAdicional','id'=>$contenido->id),array('class'=>'btn btn-primary'));
//$this->padding       = 'no-padding';
$this->pageicon      = 'fa-keyboard-o';
?>

<?php
if($model->contenidoAdicionalTipo->nombre == 'Imagen'){
    foreach($model->contenidoFotos as $foto):
    ?>

    <div class="col-md-4">
        <img style="width: 100%" src="<?php echo Yii::app()->request->baseUrl.'/images/contenidoAdicional/'.$foto->foto;?>" />
    </div>
<?php
    endforeach;
    }
?>

<?php
 $this->widget(
    'booster.widgets.TbDetailView',
    array(
        'data' => $model,
        'attributes'=>array(
            'id',
            'contenido',
        ),
    )
); ?>