<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>无标题文档</title>
<link href="app/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="app/assets/css/register.css" rel="stylesheet" type="text/css">
<link href="app/assets/css/normalize.css" rel="stylesheet"/>
<link href="app/assets/css/jquery-ui.css" rel="stylesheet"/>
<link href="app/assets/css/jquery.idealforms.min.css" rel="stylesheet" media="screen"/>
<style type="text/css">
body{font:normal 15px/1.5 Arial, Helvetica, Free Sans, sans-serif;overflow-y:scroll;padding:60px 0 0 0;}
#my-form{width:755px;margin:0 auto;border:0px solid #ccc;padding:3em;border-radius:3px;box-shadow:0 0 2px rgba(0,0,0,.2);background-color:#000;
 border-top-left-radius: 10px;
    border-top-right-radius: 10px;
border-bottom-left-radius: 10px;
border-bottom-right-radius: 10px;
filter: alpha(opacity=0); 
	opacity: 0.8;}
#comments{width:350px;height:100px;}
#flag1,#flag2,#flag3,#flag4{
float:left; 

margin-top:0px;
margin-left:10px;
background-color:#FF1111;
height:35px;
line-height：10px;
width:200px;
border-top-left-radius: 5px;
border-top-right-radius: 5px;
border-bottom-left-radius: 5px;
border-bottom-right-radius: 5px;

}
#my-h1{width:755px;height:50px;margin:0 auto;border:0px solid #ccc;padding:3em;border-radius:3px;box-shadow:0 0 2px rgba(0,0,0,.2);background-color:#000;
 border-top-left-radius: 5px;
    border-top-right-radius: 5px;
border-bottom-left-radius: 5px;
border-bottom-right-radius: 5px;
filter: alpha(opacity=0); 
	opacity: 0.8;}
</style>

</head>

<body background="app/assets/images/body1.jpg">
<script src="vendor/jquery/jquery-1.11.3.min.js"></script>
<script src="vendor/jquery/bootstrap.min.js"></script>
<div class="row" >

  <div class="eightcol last" style="height:800px;"> 
<div  id="my-h1"align="center" ><font size="5" color="#FFFFFF">注册</font></div>
    <!-- Begin Form -->

    <form id="my-form" >
   <p align="center">
    <div style="float:left; display:inline">

          <div><label><font color="#FFFFFF">username:</font></label><input id="username" name="username" type="text"  onblur="checkUse()"></div>  <div  align="center" id="flag1" style="display:none"> <font color="#FFFFFF">erqwer</font></div>
          <div><label><font color="#FFFFFF">password:</font></label><input id="pass" name="password" type="password"  onblur = "checkpass()"/></div> <div  align="center" id="flag2"  style="display:none"> <font color="#FFFFFF"> </font></div>
          <div><label><font color="#FFFFFF">repeatPassword:</font></label><input id="repass" name="repassword" type="password"  onblur = "checkRe()"/></div><div  align="center" id="flag3"  style="display:none"> <font color="#FFFFFF"> </font></div>
          <div><label><font color="#FFFFFF">e-mail:</font></label><input id="email" name="email" data-ideal="required email" type="email"  onblur="checkmail()"/></div><div  align="center" id="flag4"  style="display:none"> <font color="#FFFFFF" > </font></div>
        <!--   <div><label><font color="#FFFFFF">出生日期:</font></label><input id="date" name="date" class="datepicker" data-ideal="date" type="text" placeholder="月/日/年"/></div> -->
          <!-- <div><label><font color="#FFFFFF">上传头像:</font></label><input id="file" name="file" multiple type="file"/></div> -->
    
   </p>
        </div> 

       
<div><hr/></div>
       <div style="margin-top:10px">
       	
       	<label>yes</label>
       </div>
      <div   style="margin-top:40px" >
	     
        <button type="button" style="background-color:#060; border-color:#030; width:100px;"  onclick = "submit1()"><font color="#FFFFFF">提交</font></button>
        <button id="reset" type="button" style="background-color:#060; border-color:#030; width:100px;"><font color="#FFFFFF">重置</font></button>
        
     
      </div>
	
   
		 
    </form>

    <!-- End Form -->

  </div>

</div>
<script type="text/javascript" src="vendor/jquery/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="vendor/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="vendor/jquery/jquery.idealforms.js"></script>
<script type="text/javascript">
var options = {

	onFail: function(){
		alert( $myform.getInvalid().length +' invalid fields.' )
	},

	inputs: {
		'password': {
			filters: 'required pass',
		},
		'username': {
			filters: 'required username',
			data: {
			//ajax: { url:'validate.php' }
			}
		},
		'file': {
			filters: 'extension',
			data: { extension: ['jpg'] }
		},
		'comments': {
			filters: 'min max',
			data: { min: 50, max: 200 }
		},
		
		'langs[]': {
			filters: 'min max',
			data: { min: 2, max: 3 },
			errors: {
				min: 'Check at least <strong>2</strong> options.',
				max: 'No more than <strong>3</strong> options allowed.'
			}
		}
	}
	
};

var $myform = $('#my-form').idealforms(options).data('idealforms');

$('#reset').click(function(){
	$myform.reset().fresh().focusFirst()
});

$myform.focusFirst();
var warning1 = document.getElementById('flag1');
	var warning2 = document.getElementById('flag2');
	var warning3 = document.getElementById('flag3');
	var warning4 = document.getElementById('flag4');
function submit1()
{
	var username = document.getElementById('username').value;
	var password = document.getElementById('pass').value;
	var repeat = document.getElementById('repass').value;
	var mail = document.getElementById('email').value;
	var passreg =/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
	var passValiable = passreg.test(password);
	var usereg = /^[a-z](?=[\w.]{3,31}$)\w*\.?\w*$/i;
	var usernameVa = usereg.test(username);
	var mailreg = /[^@]+@[^@]/;
	var mailVa = mailreg.test(mail);
	if(username.length==0)
	{
		warning1.innerHTML="用户名不能为空";
		warning1.style.display="block";
	}
	else if(password.length==0)
	{
		warning2.innerHTML="密码不能为空";
		warning2.style.display="block";
	}
	else if(repeat.length==0)
	{
		warning3.innerHTML="确认密码不能为空";
		warning3.style.display="block";
	}
	else if(mail.length==0)
	{
		warning4.innerHTML="邮箱不能为空";
		warning4.style.display="block";
	}
	else if(password!=repeat)
	{
		warning3.innerHTML="两次输入密码不一致";
		warning3.style.display="block";
	}
	else if(!usernameVa)
	{
		warning1.innerHTML="用户名格式不正确";
		warning1.style.display="block";
	}
	else if(!passValiable)
	{
		warning2.innerHTML="密码格式不正确";
		warning2.style.display="block";
	}
	else if(!mailVa)
	{
		warning4.innerHTML="邮箱格式不正确";
		warning4.style.display="block";
	}
	else{
	$.ajax(
	{
		type:'get',
		url:'registerintoTable?username='+username+'&password='+password+'&mail='+mail,
		//data:{id:username,password:password,repassword:repeat,mail:mail},
		dataType:'text',
		success:function(data)
		{
			if(data=='0')
			{
		       warning1.innerHTML="该用户名已被注册";
		       warning1.style.display="block";
			}
			else if(data=='2')
			{
				warning4.innerHTML="该邮箱已被注册";
				warning4.style.display="block";
			}
			else
			{
				window.location.href="verify?username="+username;
			}
		},
		error:function()
		{
			alert("注册失败");
		}
	})
}
}
function checkpass()
{
	    var password = document.getElementById('pass');
	// if(password.value.length==0)
	// {
	// 	warning2.innerHTML="密码不能为空";
	// 	warning2.style.display="block";
	// }
	// else {
		if(password.value.length!=0){
		var passreg =/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
	   	var passValiable = passreg.test(password.value);
		if(!passValiable)
		{
			warning2.innerHTML="密码格式不正确";
			warning2.style.display="block";
		}
	}

}

function checkRe()
{
	var repassword = document.getElementById('repass');
	// if(repassword.value.length==0)
	// {
	// 	warning3.innerHTML="输入确认密码";
	// 	warning3.style.display="block";
	// }
	//else
	if(repassword.value.length!=0)
	{
		var password = document.getElementById('pass').value;
		if(repassword.value!=password)
		{
			warning3.innerHTML="两次输入密码不一致";
			warning3.style.display="block";
		}
	}
}

function checkmail()
{
	var mail = document.getElementById('email');
	// if(mail.value.length==0)
	// {
	// 	warning4.innerHTML="邮箱不能为空";
	// 	warning4.style.display="block";
	// }
	// else
	if(mail.value.length!=0)
	{
		var mailreg = /[^@]+@[^@]/;
		var mailVa = mailreg.test(mail.value);
		if(!mailVa)
		{
			warning4.innerHTML="邮箱格式不正确";
			warning4.style.display="block";
		}
		else{
		$.ajax(
	{
		type:'get',
		url:'checkMailUse?mail='+mail.value,
		dataType:'text',
		success:function(data)
		{
			if(data=='0')
			{
				warning4.innerHTML="该邮箱已被注册";
				warning4.style.display="block";

			}
			// else
			// {
			// 	document.getElementById('submit').disabled=false;
			// }

		}
	});
	}
}
}
function checkUse()
{
	
	var username = document.getElementById('username').value;
	var usereg = /^[a-z](?=[\w.]{3,31}$)\w*\.?\w*$/i;
	var usernameVa = usereg.test(username);
	if(!usernameVa&&username.length!=0)
	{
		warning1.innerHTML="用户名格式不正确";
		warning1.style.display="block";
	}
	$.ajax(
	{
		type:'get',
		url:'checkUse?username='+username,
		dataType:'text',
		success:function(data)
		{
			if(data=='0')
			{
				warning1.innerHTML="该用户名已被注册";
				warning1.style.display="block";

			}
			// else
			// {
			// 	document.getElementById('submit').disabled=false;
			// }

		}
	});

}

// function myclick()
// {
//     //document.getElementById(value).style.display="none";
//    // document.getElementById('flag1').style.display="none";
//    warning1.innerHTML="lalla";
// }
$('#username').focus(function()
{
	warning1.style.display="none";
});
$('#pass').focus(function()
{
	warning2.style.display="none";
});
$('#repass').focus(function(){
	warning3.style.display="none";
});
$('#email').focus(function()
{
	warning4.style.display="none";
})
</script>
</body>
</html>
