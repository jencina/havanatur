<?php
$this->pageTitle=Yii::app()->name . ' - Registar Usuario';
$this->breadcrumbs=array(
	'Ingresar'=>array('site/ingresar'),'Registar Usuario'
);
$this->headerTitulo    = 'Registro Usuario';
?>

<div class="page-header" style="">
    <h1>
        Formulario Registro Usuario
    </h1>
</div>
<div id="interesado">
   <?php $this->renderPartial('application.views.user._interesadoForm',array('model'=>$model)); ?> 
</div>

<script>

$("#interesado-form").submit(function(){
    
    $.ajax({
        url  : "<?php echo Yii::app()->createURL('site/registrar');?>",
        type : 'post',
        dataType: 'json',
        data : $(this).serialize(),
        beforeSend : function(){
            $("#btn-int").button('loading');
        },
        success: function(data){
            if(data.status == "failed"){
                $("#content").html(data.data);
            }else if(data.status == "success"){
                $("#content").html(data.data);
                setTimeout(
                window.location.href = "<?php echo Yii::app()->createURL('site/ingresar');?>"
                , 5000); 
            }  
        },
        complete:function(){
             $("#btn-int").button('reset');
        }
    });
    
    return false;
});
</script>
