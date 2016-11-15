

<div class="col-md-12">
    <div id="incluye" class="page-header-detail btn-success">
        <h3 style="color: #fff">
            INCLUYE
        </h3>
        <?php echo CHtml::ajaxLink('<i class="fa fa-plus-square"></i>',array("programa/addIncluye"),array(
            "beforeSend" => 'js:function(){
                $("#modalIncluye").modal("show");

                }',
            "success"=>'js:function(data){
                     $("#modalIncluye .modal-body").html(data.data);
                    //$("#ProgramaIncluye_nombre").wysihtml5();
                }',
            "type"=>"post",
        ),array("id"=>'addIncluye')); ?>

    </div>

    <ul id="list-incluye" class="include list-group">
        <?php foreach($incluye as $in):?>
            <li class="list-group-item list-group-item-success"><i class="fa fa-check-square-o"></i><?php echo $in->nombre?></li>
        <?php endforeach;?>
    </ul>
</div>

<div class="com-md-12">
<?php

$this->widget(
    'booster.widgets.TbListView',
    array(
        'id'=>'combinaciones',
        'dataProvider' => $combi->search(),
        'template' => "{items}\n{pager}",
        'itemView' => 'application.views.programa.pdf._combiPdf',
    )
);

?>
</div>

