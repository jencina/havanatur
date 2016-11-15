
<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'homeLink' => CHtml::link(Yii::t('zii', 'Programa'), array('programa/admin')),
        'links' => array('Caracteristicas'),
    )
);
?>

<?php
//$assetUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.booster.assets'));
//Yii::app()->clientScript->registerScriptFile($assetUrl.'/bootstrap3-wysihtml5/wysihtml5-0.3.0.js');
//Yii::app()->clientScript->registerScriptFile($assetUrl.'/bootstrap3-wysihtml5/bootstrap3-wysihtml5.js');
//Yii::app()->clientScript->registerCssFile($assetUrl.'/bootstrap3-wysihtml5/bootstrap-wysihtml5.css');
?>



<div class="page-header">
    <h1>Caracteristicas <small>programa #<?php echo $model->id; ?></small></h1>
</div>



<div class="col-md-12">
    <div class="col-md-4">
        <div id="incluye" class="page-header-detail btn-success">
            <h3>
                INCLUYE
            </h3>
            <?php echo CHtml::link('<i class="fa fa-plus-square"></i>','',array('onclick'=>'js:openIncluye()')); ?>

        </div>

        <ul id="list-incluye" class="include list-group">
            <?php foreach($incluye as $in):?>
                <li id="li-<?php echo $in->id?>" class="list-group-item list-group-item-success">
                    <i class="fa fa-check-square-o"></i><?php echo $in->nombre?>
                    <div class="action">
                        <?php
                        echo Chtml::link('<i class="fa fa-pencil-square-o"></i>','',array('onclick'=>"js:openIncluye({$in->id})"));
                        echo Chtml::link('<i class="fa fa-trash-o"></i>','',array('onclick'=>"js:deleteIncluye({$in->id})"));

                        ?>
                    </div>
                </li>
            <?php endforeach;?>
        </ul>
    </div>

    <div class="col-md-4">
        <div id="noIncluye" class="page-header-detail">
            <h3>
                NO INCLUYE
            </h3>
            <?php echo CHtml::link('<i class="fa fa-plus-square"></i>','',array('onclick'=>'js:openNoIncluye()')); ?>
        </div>

        <ul id="list-noIncluye" class="include list-group">
            <?php foreach($noIncluye as $in):?>
                <li id="li-<?php echo $in->id?>" class="list-group-item list-group-item-danger">
                    <i class="fa fa-minus-square-o"></i><?php echo $in->nombre?>
                    <div class="action">
                        <?php
                        echo Chtml::link('<i class="fa fa-pencil-square-o"></i>','',array('onclick'=>"js:openNoIncluye({$in->id})"));
                        echo Chtml::link('<i class="fa fa-trash-o"></i>','',array('onclick'=>"js:deleteNoIncluye({$in->id})"));

                        ?>
                    </div>
                </li>
            <?php endforeach;?>
        </ul>
    </div>

    <div class="col-md-4">
        <div id="suplemento" class="page-header-detail">
            <h3>
                SUPLEMENTO AEREO
            </h3>
            <?php echo CHtml::link('<i class="fa fa-plus-square"></i>','',array('onclick'=>'js:openSuplemento()')); ?>
        </div>

        <ul id="list-suplemento" class="include list-group">
            <?php foreach($suplemento as $in):?>
                <li id="li-<?php echo $in->id?>" class="list-group-item list-group-item-info">
                    <i class="fa fa-plane"></i>CLASE <?php echo $in->clase; ?> USD <?php echo $in->usd; ?>
                    <div class="action">
                        <?php
                        echo Chtml::link('<i class="fa fa-pencil-square-o"></i>','',array('onclick'=>"js:openSuplemento({$in->id})"));
                        echo Chtml::link('<i class="fa fa-trash-o"></i>','',array('onclick'=>"js:deleteSuplemento({$in->id})"));

                        ?>
                    </div>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>


<!-- MODAL INCLUYE -->
<?php $this->beginWidget(
    'booster.widgets.TbModal',
    array('id' => 'modalIncluye')
); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>AGREGAR INCLUYE</h4>
</div>

<div class="modal-body"></div>

<?php $this->endWidget(); ?>
<!-- FIN MODAL INCLUYE -->


<?php $this->beginWidget(
    'booster.widgets.TbModal',
    array('id' => 'modalNoIncluye')
); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>AGREGAR NO INCLUYE</h4>
</div>

<div class="modal-body"></div>

<?php $this->endWidget(); ?>


<?php $this->beginWidget(
    'booster.widgets.TbModal',
    array('id' => 'modalSuplemento')
); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>AGREGAR SUPLEMENTO</h4>
</div>

<div class="modal-body"></div>

<?php $this->endWidget(); ?>

<script>

    function openIncluye(id = ''){
        $.ajax({
            url  : "<?php echo Yii::app()->createURL('programa/openIncluye',array('programa'=>$model->id,'id'=>''));?>"+id,
            type : 'post',
            dataType:'json',
            data : id,
            beforeSend:function(){
                $("#modalIncluye").modal("show");
            },
            success: function(data){
                    $("#modalIncluye .modal-body").html(data.data);
            }
        });
        return false;
    }

    function deleteIncluye(id){
        $.ajax({
            url  : "<?php echo Yii::app()->createURL('programa/deleteIncluye');?>",
            type : 'post',
            dataType:'json',
            data : {id:id},
            success: function(data){
                if(data.result == 'save'){
                    $("#list-incluye #li-"+data.id).replaceWith('');
                }
            }
        });
        return false;
    }

    function openNoIncluye(id = ''){
        $.ajax({
            url  : "<?php echo Yii::app()->createURL('programa/openNoIncluye',array('programa'=>$model->id,'id'=>''));?>"+id,
            type : 'post',
            dataType:'json',
            data : id,
            beforeSend:function(){
                $("#modalNoIncluye").modal("show");
            },
            success: function(data){
                    $("#modalNoIncluye .modal-body").html(data.data);
            }
        });
        return false;
    }

    function deleteNoIncluye(id){
        $.ajax({
            url  : "<?php echo Yii::app()->createURL('programa/deleteNoIncluye');?>",
            type : 'post',
            dataType:'json',
            data : {id:id},
            success: function(data){
                if(data.result == 'save'){
                    $("#list-noIncluye #li-"+data.id).replaceWith('');
                }
            }
        });
        return false;
    }

    function openSuplemento(id = ''){
        $.ajax({
            url  : "<?php echo Yii::app()->createURL('programa/openSuplemento',array('programa'=>$model->id,'id'=>''));?>"+id,
            type : 'post',
            dataType:'json',
            data : id,
            beforeSend:function(){
                $("#modalSuplemento").modal("show");
            },
            success: function(data){
                $("#modalSuplemento .modal-body").html(data.data);
            }
        });
        return false;
    }

    function deleteSuplemento(id){
        $.ajax({
            url  : "<?php echo Yii::app()->createURL('programa/deleteSuplemento');?>",
            type : 'post',
            dataType:'json',
            data : {id:id},
            success: function(data){
                if(data.result == 'save'){
                    $("#list-suplemento #li-"+data.id).replaceWith('');
                }
            }
        });
        return false;
    }

</script>