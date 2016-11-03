<ul class="pagination">

    <?php
    if ($limit != 0) {
        $all = ceil($total / $limit);
        $page = ceil($offset / $limit);
    } else {
        $all = 0;
        $page = 0;
    }

    $from = max([$page - 5, 0]);
    $to = min([$all, $page + 5]);

     if ($from > 0) { ?> 
        <li><?= $urlfunc(0) ?></li>
        <li> <a class="disabled">...</a> </li>

    <?php 
    
     }
        
    for ($i = $from; $i < $to; $i++) {

        ?>
        <li class="<?= $page == $i ? 'active' : ''?>"><?= $urlfunc($i) ?> </li>
        <?php
    }
    ?>
    <?php if ($all > $to) { ?> 
        <li> <a class="disabled">...</a> </li>
        <li><?= $urlfunc($all - 1) ?></li>

    <?php } ?>
</ul>