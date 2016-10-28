<?php
include BASE . '/tpl/header.php';
?>
<h1>127.0.0.1</h1>
<form method="post" action="/:system(create,db)">
    <div class="row">    
        <div class="col-md-12">
            <h2>Create new database</h2>


        </div>
        <div class="col-md-4">
            <input class="form-control" type="text" name="dbname" placeholder="Database name" />
        </div>
        <div class="col-md-4">
            <select class="form-control" name="charset">
                <option value="utf8_bin">utf8_bin</option>
                <option value="utf8_unicode_ci">utf8_unicode_ci</option>
            </select>
        </div>
        <div class="col-md-4">
            <button class="btn btn-success">Add database</button>
        </div>
    </div>
</form>

<div class="row">    
    <div class="col-md-12">

        <h2>List databases</h2>


        <table class="table table-striped table-responsive table-hover">
            <?php
            foreach (sql::_()->get_databases()[1] as $db) {
                print '<tr>';

                print '<td>' . url($db[0], $db[0]) . '</td>';
                ?>
                <td> <a href="/:system(delete,db):name(<?=$db[0]?>)" class="btn btn-danger">delete</a> </td>
                <?php
                print '</tr>';
            }
            ?>
        </table>
    </div>
</div>
<?php
include BASE . '/tpl/footer.php';
?>