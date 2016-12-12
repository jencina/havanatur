
<?php
$this->breadcrumbs   = array('Contenido'=>array('contenido/admin'),'Adicional',$model->contenido0->titulo=>array('contenido/adicional','id'=>$model->contenido0->id),'Fotos');
$this->pagetitulo    = 'Contenido Adicional';
$this->pagesubtitulo = 'Fotos';
$this->btncreateajax = array('url'=>Yii::app()->createUrl('contenido/imagenAdicionalUpload',array('id'=>$model->id)),'id'=>'datos') ;
//$this->padding       = 'no-padding';
$this->pageicon      = 'fa-keyboard-o';
?>

<?php
echo CHtml::openTag('div', array('class' => 'row-fluid'));
$this->widget(
    'booster.widgets.TbThumbnails',
    array(
        'id'=>'datos',
        'dataProvider' => $fotos->search(),
        'template' => "{items}\n{pager}",
        'itemView' => 'application.views.contenido._imagenAdicional',
    )
);
echo CHtml::closeTag('div');
?>


<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>


<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery" data-use-bootstrap-modal="false">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


