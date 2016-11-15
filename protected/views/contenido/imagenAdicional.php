<?php

/* @var $this UsuarioController */
/* @var $model Usuario */
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'homeLink' => CHtml::link(Yii::t('zii', 'Hotel'), array('hotel/admin')),
        'links' => array('Fotos'),
    )
);
?>

<div class="page-header">
    <h1>Fotos Contenido Adicional<small>#<?php echo $model->id; ?></small>
        <?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
            array(
                'id'=>'uploadFile',
                'config'=>array(
                    'action'=>Yii::app()->createUrl('contenido/imagenAdicionalUpload',array('id'=>$model->id)),
                    'allowedExtensions'=>array("jpg","png"),//array("jpg","jpeg","gif","exe","mov" and etc...
                    'sizeLimit'=>50*1024*1024,// maximum file size in bytes
                    'multiple'=>false,
                    'onSubmit'=> "js:function(id, fileName){
                     $('#ajaxupload').button('loading');
                     $('ul.qq-upload-list').remove();
                    }",
                    'onComplete'=>"js:function(id, fileName, responseJSON){
                    $.fn.yiiListView.update('datos',{});
                    $('#ajaxupload').button('reset');
                    }",

                )
            )); ?>
    </h1>
</div>

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
