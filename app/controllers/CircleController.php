<?php 
	/**
	* 朋友圈
	*/
	class CircleController 
	{
		
		function me()
		{
			echo "hell";
			
		}

		function addpost(){
			$addpost = new Template;
			echo $addpost->render('application/addpost.html');
		}

		function post(){
			
		}

		function savepost($f3){
			// $db = $f3->get('DB');
			// $post = new DBSQLMapper($db,'post');
			// $post->content = $_POST['content'];
			// $post->published_at = date('Y-m-d H:i:s',time());
			// $post->userid = $_SESSION['user_id'];

			//图片上传
			$upfile = "app/uploads/".$_FILES['file']['name'];
			move_uploaded_file($_FILES['file']['tmp_name'], $upfile);

		}
	}
	
 ?>