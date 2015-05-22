<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>发布动态</title>
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
    </head>
    <body>
        <form action="/circle/savepost" method="post">
            <div class="form-group">
                <label for="saysth">说点什么：</label>
                <input type="text" class="form-control" id="saysth" placeholder="" name="content">
            </div>
            <div class="form-group">
                <label for="file">上传图片：</label>
                <input type="file" name="file" id="file">
            </div>
            <button type="submit" class="btn btn-default">发布</button>
        </form>
    </body>
</html>