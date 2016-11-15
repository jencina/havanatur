<ul style="font-size: 12px;color:#6b7279;">
    <?php foreach($incluye as $in):?>
        <li>
            <i class="fa fa-check-square-o"></i>
            CLASE <?php echo $in->clase; ?> USD <?php echo $in->usd; ?>
        </li>
    <?php endforeach;?>
</ul>