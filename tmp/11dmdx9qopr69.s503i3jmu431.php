<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>密码管家</title>
<link href="app/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="app/assets/css/login.css" rel="stylesheet" type="text/css">

</head>

<body>
<script src="vendor/jquery/jquery-1.11.3.min.js"></script>
<script src="vendor/jquery/bootstrap.min.js"></script>
<script type="text/javascript" src="vendor/jquery/jquery-1.6.2.min.js"></script>
<p align="center" style=" margin-top:150px; "><font size="+5" color="#FFFFFF">密码管家</font></p>
<div id="div">
<div></div>

<div style="padding: 20px 100px 20px 140px;">
  
  <!--  <form method="post" action="" onsubmit="" class="login">
    <p>
      <label for="login" ><font color="#FFFFFF">用户名:</font></label>
      <input type="text" name="id" id="id" value=""></input>
    </p>

    <p>
      <label for="password" ><font color="#FFFFFF">密码:</font></label>
      <input type="password" name="password" id="password" value=""></input>
    </p>

    </form> -->
    <form action="" method="POST" role="form">
    
      <div class="form-group">
        <!-- <label for="username">label</label> -->
        <input type="text" class="form-control" id="id" name="id" placeholder="请输入您的用户名">
      </div>
    
       <div class="form-group">
        <!-- <label for="username">label</label> -->
        <input type="password" class="form-control" id="password" name="password" placeholder="请输入您的密码">
      </div>
    
    </form>
</div>
<p align="center"><button type="button" class="btn btn-primary" style="background-color:#060; border-color:#030; width:100px;" onclick="check()" >登陆</button></p>
<a href="forgetpass"  style="margin-right:30%;float:right">忘记密码?</a>
<a href="register"  style="margin-right:70px;float:right">注册</a>
</div>
</body>
<script type="text/javascript">
function check()
{
  var id = document.getElementById('id').value;
  var password = document.getElementById('password').value;
  $.ajax(
  {
    type:"GET",
    url : "check?id="+id+"&password="+password,
    datatype:"text",
    success:function(data)
    {
      if(data=='1')
      {
        window.location.href = 'home';
      }   
      else if(data=='2')
      {
        alert("the accout has not verified");
      } 
      else if(data=='4')
      {
        alert("the password doesn't match the uername!");
      }
      else
        alert("no account");
    },
    error:function(data)
    {
      alert("登陆失败！");
    }
  });
}

</script>
</html>
