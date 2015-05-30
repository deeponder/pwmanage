<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>COLLECTIONS</title>
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
    </head>
    <body>
        <?php foreach (($list?:array()) as $list): ?>
        <span><?php echo $list['0']['nick_name']; ?></span>&nbsp&nbsp<span><img src="../app/uploads/<?php echo $list['0']['image']; ?>.jpg"
        height="50" width="50"></span>&nbsp&nbsp<span><?php echo $list['0']['content']; ?></span>&nbsp&nbsp&nbsp&nbsp&nbsp<span>published at:<?php echo $list['0']['published_at']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a
        class="btn btn-default" href="delCol?post_id=<?php echo $list['0']['post_id']; ?>" role="button">Cancel Collect</a><br><br>
        <?php endforeach; ?>
        <br>
        <a href="home"><span class="glyphicon glyphicon-menu-left col-md-offset-1"></span>BACK</a>
    </body>
</html>