<ul class="pagination">
    <li><a href="#"> << </a></li>

    <?php
    if ($limit != 0) {
        $all = ceil($total / $limit);
        $page = ceil($offset / $limit);
    } else {
        $all = 0;
        $page = 0;
    }
    for ($i = max([$page - 5, 0]); $i < min([$all, $page + 5]); $i++) {
        ?>
        <li><?= $urlfunc($i) ?> </li>
        <?php
    }
    ?>

    <li><a href="#"> >> </a></li>
</ul>