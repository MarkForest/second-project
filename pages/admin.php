<div class="row">
    <div class="col-md-6">
<!--        section A: for form Countries-->
        <?php
            connect();
            $select = "select * from  countries order by id";
            $resourse = mysql_query($select);
        ?>

        <form action="index.php?page=4" method="post">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3>Form For Countries</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <?php while ($row = mysql_fetch_array($resourse)):?>
                            <tr>
                                <td><?= $row[0]?></td>
                                <td><?= $row[1] ?></td>
                                <td><input type="checkbox" name="cb<?= $row[0]?>"></td>
                            </tr>
                        <?php endwhile;?>
                    </table>
                    <?php mysql_free_result($resourse);?>
                    <div class="form-group">
                        <input type="text" name="country" placeholder="Country" class="form-control">
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="form-group">
                        <input type="submit" name="addcountry" value="Add" class="btn btn-info">
                        <input type="submit" name="delcountry" value="Delete" class="btn btn-danger">
                    </div>
                </div>
            </div>
        </form>
        <?php
            if (isset($_POST['addcountry'])) {
                $country = trim(htmlspecialchars($_POST['country']));
                if ($country == '') {
                    return false;
                }
                $insert = "insert into countries(country)values('$country')";
                mysql_query($insert);
                log_mysql(mysql_errno());
                page_reload();
            }
            if (isset($_POST['delcountry'])) {
                foreach ($_POST as $key => $value) {
                    if (substr($key, 0, 2) == "cb") {
                        $idc = substr($key, 2);
                        $delete = "delete from countries where id = $idc";
                        mysql_query($delete);
                        log_mysql(mysql_errno());
                    }
                }
                page_reload();
            }
        ?>
    </div>
    <div class="col-md-6">
<!--        section A: for form Cities-->
    </div>
    <div class="col-md-6">
<!--        section A: for form Hotels-->
    </div>
    <div class="col-md-6">
<!--        section A: for form Images-->
    </div>
</div>