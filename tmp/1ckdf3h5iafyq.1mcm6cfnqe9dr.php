<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>FOLLOWERS</title>
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
    </head>
    <body>
        <?php foreach (($follower?:array()) as $follower): ?>
        <?php foreach (($follower?:array()) as $follower): ?>
        <div class="row">
            <div class="col-md-3 col-md-offset-1"><?php echo $follower['nick_name']; ?></div>
            <div class="col-md-4 col-md-offset-4"><a class="btn btn-default"
                href="handleFoll?id=<?php echo $follower['user_id']; ?>&tag=0" role="button">REMOVE
            FOLLOWER</a></div>
        </div>
        <br>
        <?php endforeach; ?>
        <?php endforeach; ?>
        <br>
        <a href="home"><span class="glyphicon glyphicon-menu-left col-md-offset-1"></span>BACK</a>
    </body>
</html>