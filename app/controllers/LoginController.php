<?php
class LoginController
{
	function login($f3)
	{
		session_start();
		if(!isset($_SESSION['user_id'])){
			echo Template::instance()->render('application/login.html');
		}
	}



	function check($f3)
	{
		$username = $_GET['id'];
		$password = $_GET['password'];
		$db = $f3->get('DB');
		$mysql = new \DB\SQL\Mapper($db,'person_info');	
		$num = $mysql->count(array('nick_name=? and password=?',$username,md5($password)));
		if($num!=0)
			{
				echo 1;
				$user = $mysql->find(array('nick_name=?',$username));
				$user_id = $user[0]->id;
				$_SESSION['user_id']=$user_id;				
			}
		else
			echo 0;
	}




	function register($f3)
	{
		echo Template::instance()->render('application/register.html');  
	}
	function registerintoTable($f3)
	{
		$db = $f3->get('DB');
		$mysql = new \DB\SQL\Mapper($db,'person_info');
		$username = $_GET['username'];
		$password = $_GET['password'];
		//$repeatpassword = $_GET['repassword'];
		$mail = $_GET['mail']; 
		$num = $mysql->count(array('nick_name=?',$username));
		if($num==0)
			{
				$mysql->nick_name = $username;
				$mysql->password = md5($password);
				$mysql->mail = $mail;
				$mysql->save();
				header("Location:login");
			}
		else echo 0;
		

	}
	function checkUse($f3)
	{
		$db = $f3->get('DB');
		$mysql = new \DB\SQL\Mapper($db,'person_info');	
		$username = $_GET['username'];
		$num = $mysql->count(array('nick_name=?',$username));
		if($num==0)
			echo 1;
		else echo 0;
	}



	function logout($f3)
	{
		session_start();
		unset($_SESSION['user_id']);
		header("Location:login");
	}
}