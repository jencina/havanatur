<?php foreach($data as $index=>$dato):?> 
    <?php
    switch ($index) {
        case 'dolar':
            $icon  = 'fa fa-usd';
            $signo = 'peso';
            $fecha = $dato['ind_fecha'];
            break;
        case 'euro':
            $icon  = 'fa fa-eur';
            $signo = 'peso';
            $fecha = $dato['ind_fecha'];
            break;
        case 'uf':
            $icon  = 'fa fa-money';
            $signo = 'peso';
            $fecha = $dato['ind_fecha'];
            break;
        case 'utm':
            $icon  = 'fa fa-money';
            $signo = 'peso';
            $fecha = $dato['ind_fecha'];
            break;
        case 'ipc':
            $icon  = 'fa fa-user';
            $signo = 'porcen';
            $fecha = $dato['ind_fecha'];
            break;
    }
?>

<li><i class="<?php echo $icon; ?>"></i><?php echo ' '.$index .': ';?><?php echo ($signo == 'peso')?"$":"";?><?php echo $dato['ind_valor']?><?php echo ($signo =='porcen')?"%":"";?></li>
   
<?php endforeach; ?>