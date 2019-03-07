# second-project
Закрепление модуля php, работа с MySQl. Сайт "Поехали с нами!!!"

simple work with mysql
<div style="background: #ccc;">
$link = mysql_connect('localhost', 'root', '');
mysql_select_db('blogdb', $link);
if (isset($_POST['public'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $title = htmlspecialchars(trim($title));
    $content = htmlspecialchars(trim($content));
    if (empty($title) || empty($content)) {
        echo "<h2>Error to database</h2>";
    } else {
        $insert = "insert into post (title, content) values ('$title', '$content')";
        mysql_query($insert, $link);
        $err = mysql_errno();
        if ($err) {
            echo '<h1 style="color: red">Erorr</h1>'.$err;
        }
    }

}

echo '<h1>Tours Page</h1>';
?>
<form action="#" method="post">
    <div class="form-group">
        <input type="text" name="title" class="form-control">
    </div>
    <div class="form-group">
        <textarea name="content" id="" class="form-control" cols="30" rows="10"></textarea>
    </div>
    <input type="submit" name="public" value="Публиковать" class="btn btn-primary">
</form>
<?php
    $select = 'select title, content from post';
    $resource = mysql_query($select, $link);
    echo '<div class="row">';
    while ($row = mysql_fetch_array($resource)) {
        echo "<div class='col-md-3'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'><h2>$row[0]</h2></div>
                    <div class='panel-body'>$row[1]</div>
                    <div class='panel-footer'>by markforest...</div>
                </div>
              </div>";
    }
    echo '</div>';

?>
</div> 