<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>

<?php
$this->breadcrumbs   = array('');
$this->pagetitulo    = 'Havanatur';
$this->pagesubtitulo = 'Admin v2.0';
//$this->btncreate     = CHtml::link('Nuevo',array('Hotel/create'),array('class'=>'btn btn-primary'));
//$this->padding       = 'no-padding';
$this->pageicon      = 'fa-home';

//$baseUrl = Yii::app()->baseUrl;
//$cs = Yii::app()->getClientScript();
//$cs->registerScriptFile($baseUrl . '/admin-files/js/app.config.seed.js',CClientScript::POS_END );
?>

<div id="wid-id-1" class="jarviswidget jarviswidget-sortable" data-widget-editbutton="false" role="widget">
    <header role="heading">
        <span class="widget-icon">
            <i class="fa fa-bar-chart-o"></i>
        </span>
        <h2>Cotizaciones Ultimos 60 dias</h2>
    </header>
    <div role="content"> <div id="cotizaciones"></div></div>
</div>

<div id="wid-id-1" class="jarviswidget jarviswidget-sortable" data-widget-editbutton="false" role="widget">
    <header role="heading">
        <span class="widget-icon">
            <i class="fa fa-bar-chart-o"></i>
        </span>
        <h2>Inscritos a Eventos Ultimos 60 dias</h2>
    </header>
    <div role="content"> <div id="interesados"></div></div>
</div>






<script> 
$(function () {
    var cot = <?php echo json_encode($cot);?>;
    Highcharts.chart('cotizaciones', {
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Total diario'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y}'
                }
            }
        },

        tooltip: {
           headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
    },

        series: [{
            name: 'Cotizaciones',
            colorByPoint: true,
            data: cot
        }],
    });

    var int = <?php echo json_encode($int);?>;
    Highcharts.chart('interesados', {
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Total Diario'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y}'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
        },

        series: [{
            name: 'Inscritos',
            colorByPoint: true,
            data: int
        }],
    });
});
</script>
