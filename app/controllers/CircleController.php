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

		function savepost(){
			// $db = $f3->get('DB');
			// $post = new DBSQLMapper($db,'post');
			// $post->content = $_POST['content'];
			// $post->published_at = date('Y-m-d H:i:s',time());
			// $post->userid = $_SESSION['user_id'];

			//图片上传
			// $upfile = "app/uploads/".$_FILES['file1']['name'];
			// move_uploaded_file($_FILES['file1']['tmp_name'], $upfile);
			// 

			if(isset($_POST['submit'])){
			$name = $_FILES["file"]["name"];
			//$size = $_FILES['file']['size']
			//$type = $_FILES['file']['type']

			$tmp_name = $_FILES['file']['tmp_name'];
			$error = $_FILES['file']['error'];

			if (isset ($name)) {
			    if (!empty($name)) {

			    $location = 'app/uploads/';

			    if  (move_uploaded_file($tmp_name, $location.$name)){
			        echo 'Uploaded';    
			        }

			        } else {
			          echo 'please choose a file';
			          }
			    }
			}else{
				echo "aha!";
			}

		}
	}
	
 ?>