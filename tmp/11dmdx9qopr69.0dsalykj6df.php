<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>密码大管家</title>
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
  
     
    </head>
    <body>
        <!-- 大图 -->
        <div class="jumbotron" id="test2">
            <h1>密码大管家</h1>
            <p>这里，我们提供“专业”的密码管理解决方案</p>
        </div>
        <!-- 导航栏 -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">

  <div class="navbar-form navbar-left">
               <button class="btn btn-default" data-toggle="modal" data-target="#addModal"> <span class="glyphicon glyphicon-plus"></span>添加记录</button>
</div>
                <form action="search" class="navbar-form navbar-left" role="search" method="POST">
                 
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="网站或软件" name="site">
                    </div>
                    <button type="submit" class="btn btn-default">搜索</button>
                </form>

                <div class="navbar-form navbar-right">
                	 <a href="logout"><button class="btn btn-default" data-toggle="modal" data-target="#addModal">退出登录</button></a>
                </div>

            </div>
        </nav>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="schoolInfo">
                <thead>
                    <tr>
                        <th>网址或软件</th>
                        <th>用户名</th>
                        <th>密码</th>
                        <th>备注</th>
                        <th>修改</th>
                        <th>删除</th>
                    </tr>

                </thead>
                 <tbody>
                 <?php foreach (($list?:array()) as $list): ?>
                  <tr>
                    <td><?php echo $list['web_site']; ?></td>
                    <td><?php echo $list['user_name']; ?></td>
                    <td id="<?php echo $list['id']; ?>">  <button class="btn btn-info btn-xs password" data-toggle="modal" data-target="#sepwModal" rel="<?php echo $list['id']; ?>"> <span class="glyphicon glyphicon-eye-open"></span>查看密码</button></td>
                    <td><?php echo $list['remarks']; ?></td>
                    <td><button class="btn btn-default btn-xs editrecord" data-toggle="modal" data-target="#editModal" rel="<?php echo $list['id']; ?>"> <span class="glyphicon glyphicon-edit"></span>修改记录</button></td>
                    <td>  <button class="btn btn-danger btn-xs delrecord" rel="<?php echo $list['id']; ?>"> <span class="glyphicon glyphicon-trash"></span>删除记录</button></td>
                  
                  </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>



        </div>


<!-- sepwModal -->
<div class="modal fade" id="sepwModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">查看密码</h4>
      </div>
      <div class="modal-body">
     
      	  <input type="text" placeholder="请输入查看密码" id="sepw">
      	  <input type="hidden" name="recordId" value="" id="recordid">
 
     
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button> -->
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="pwinfo">确定</button>
      </div>
    </div>
  </div>
</div>

<!-- editModal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">修改信息</h4>
      </div>
      <div class="modal-body ">
     
      	<form action="edit" method="POST" role="form" id="editform">
      	
      		<div class="form-group">
      			<label for="">网址或软件</label>
      			<input type="text" class="form-control" name="site" id="" placeholder="管理的网址或软件">
      		</div>
      		<div class="form-group">
      			<label for="">用户名</label>
      			<input type="text" class="form-control" name="username" id="" placeholder="您的用户名">
      		</div>
      		<div class="form-group">
      			<label for="">密码：</label>
      			<input type="text" class="form-control" name="pw" id="" placeholder="用户名对应的密码">
      		</div>
      		<div class="form-group">
      			<label for="">备注</label>
      			<input type="text" class="form-control" name="remark" id="" placeholder="备注">
      		</div>
 			<input type="hidden" name="editid" value="" id="editid">

      		 <button type="submit" class="btn btn-primary" >确定</button>
      
      	</form>
 
     
      </div>
   <!--    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary" data-dismiss="modal" id="editinfo">确定</button>
      </div> -->
     	
    </div>
  </div>
</div>

<!-- addModal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">添加记录</h4>
      </div>
      <div class="modal-body ">
     
      	<form action="addRecord" method="POST" role="form" id="addform">
      	
      		<div class="form-group">
      			<label for="">网址或软件</label>
      			<input type="text" class="form-control" name="site" id="" placeholder="管理的网址或软件">
      		</div>
      		<div class="form-group">
      			<label for="">用户名</label>
      			<input type="text" class="form-control" name="username" id="" placeholder="您的用户名">
      		</div>
      		<div class="form-group">
      			<label for="">密码：</label>
      			<input type="text" class="form-control" name="pw" id="" placeholder="您的密码">
      		</div>
      		<div class="form-group">
      			<label for="">查看密码的密码：</label>
      			<input type="text" class="form-control" name="sepw" id="" placeholder="查看密码的密码">
      		</div>
      		<div class="form-group">
      			<label for="">备注</label>
      			<input type="text" class="form-control" name="remark" id="" placeholder="备注">
      		</div>
      		
 
      		 <button type="submit" class="btn btn-primary" >确定</button>
      
      	</form>
 
     
      </div>
   <!--    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary" data-dismiss="modal" id="editinfo">确定</button>
      </div> -->
     	
    </div>
  </div>
</div>
        <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
        <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
        <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
        <script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script type="text/javascript">
        //点击变更密码事件
        $('.password').on('click',function(e){
        	var $target = e.target;
        	$recordId = $($target).attr('rel');
        	$('#recordid').attr('value',$recordId);
        });
        //修改记录信息
       	 $('.editrecord').on('click',function(e){
        	var $target = e.target;
        	$editid = $($target).attr('rel');
        	$('#editid').attr('value',$editid);
        });

       	 //删除记录
       	  $('.delrecord').on('click',function(e){
        	var $target = e.target;
        	$delid = $($target).attr('rel');
        	var url = 'delRecord';
        	$.getJSON(url,{delid:$delid},function(data){
        		
        		if(data){
            	alert('删除成功')
            }else{
           		alert('删除失败');
            }
        		 location.reload();  
        	});
        });

        //显示密码
        $('#pwinfo').click(function(){
        	var recordId = $('#recordid').attr('value');
        	var sepw = $('#sepw').val();
        	var url = 'getSepw';
        	$.getJSON(url,{recordId:recordId,sepw:sepw},function(re){
        		if(!re[1]){
        			alert('错误的查询密码，请重新输入');
        		}else{
        			$("#"+re[0]).html(re[1]);
        		}
        		 // location.reload();  
        		// $('#1').html(re);
        	});
        });

        //提交修改
        $('#editform').submit(function (event) {
        $('#editModal').modal('hide');
        event.preventDefault();
        var url = $(this).attr('action');
        var postdata = $(this).serialize();
        // alert(postdata);
        var request = $.post(
                url,
                postdata,
                formpostcompleted,
                "json"
        );
        function formpostcompleted(data, status) {
            if(data){
            	alert('修改成功')
            }else{
           		alert('修改失败');
            }
             location.reload();  
        }
    }); // end submit function
    


        //添加记录
        $('#addform').submit(function (event) {
        $('#addModal').modal('hide');
        event.preventDefault();
        var url = $(this).attr('action');
        var postdata = $(this).serialize();
        // alert(postdata);
        var request = $.post(
                url,
                postdata,
                formpostcompleted,
                "json"
        );
        function formpostcompleted(data, status) {
            // alert(data);
            if(data){
            	alert('添加成功')
            }else{
           		alert('添加失败');
            }
             location.reload();  
        }
    }); // end submit function

    //     //搜索
    //      $('#searchsite').submit(function (event) {
      
    //     event.preventDefault();
    //     var url = $(this).attr('action');
    //     var postdata = $(this).serialize();
    //     // alert(postdata);
    //     var request = $.post(
    //             url,
    //             postdata,
    //             formpostcompleted,
    //             "json"
    //     );
    //     function formpostcompleted(data, status) {
          
    //     }
    // }); // end submit function

  
        </script>
    </body>
</html>