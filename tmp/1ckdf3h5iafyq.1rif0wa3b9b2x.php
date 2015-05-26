<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>发布动态</title>
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
    </head>
    <body>
        <form action="/circle/savepost" method="post" enctype="multipart/form-data">
                <input type="file" name='file'>
            <button type="submit" class="btn btn-default" value="发布" name="submit">发布</button>
        </form>
    </body>
</html>