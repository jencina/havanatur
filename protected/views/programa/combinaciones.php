<?php
$this->breadcrumbs   = array('Programa'=>array('programa/admin'),$model->nombre,'Combinaciones');
$this->pagetitulo    = 'Combinaciones';
$this->pagesubtitulo = $model->nombre;
$this->btncreate     = CHtml::link('Nuevo',array('programa/addCombinacion','id'=>$model->id),array('class'=>'btn btn-primary'));
//$this->padding       = 'no-padding';
$this->pageicon      = 'fa-plane';
?>


<?php

    echo CHtml::openTag('div', array('class' => 'row-fluid'));
    $this->widget(
        'booster.widgets.TbListView',
        array(
            'id'=>'combinaciones',
            'dataProvider' => $combi->search(),
            'template' => "{items}\n{pager}",
            'itemView' => '_combinaciones',
        )
    );
    echo CHtml::closeTag('div');

?>



<?php $this->beginWidget(
    'booster.widgets.TbModal',
    array('id' => 'modalTarifa')
); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>AGREGAR TARIFA</h4>
</div>

<div class="modal-body">

</div>
<?php $this->endWidget(); ?>




<script>
    function eliminarCombinacion(id){

            $.ajax({
                url  : "<?php echo Yii::app()->createURL('programa/combinacionDelete');?>",
                type : 'post',
                cache: false ,
                data:{ id:id },
                success: function(data){
                    $.fn.yiiListView.update("combinaciones");
                }
            });
        return false;
    }

    function eliminarTarifa(id){
        $.ajax({
            url  : "<?php echo Yii::app()->createURL('programa/deleteTarifa');?>",
            type : 'post',
            cache: false ,
            data : {id:id},
            success: function(data){
				$.fn.yiiListView.update('combinaciones');
                //$('#vigencia'+data.id).remove();
            }

        });
        return false;
    }

    function createTarifas(id){
        $.ajax({
            url  : "<?php echo Yii::app()->createURL('programa/tarifas');?>",
            type : 'post',
            cache: false ,
            data : {id:id},
            beforeSend : function(){
                $("#modalTarifa").modal("show");
            },
            success: function(data){
                    $("#modalTarifa .modal-body").html(data.div);
            }
        });

        return false;
    }
	
	function editarTarifa(id){
        $.ajax({
            url  : "<?php echo Yii::app()->createURL('programa/editarTarifa');?>",
            type : 'post',
            cache: false ,
            data : {id:id},
            beforeSend : function(){
                $("#modalTarifa").modal("show");
            },
            success: function(data){
                    $("#modalTarifa .modal-body").html(data.div);
            }
        });

        return false;
    }



</script>