<?php

class TestController{
	function test($f3){
		//数据库操作
		//需要打开index.php中关于数据库的两行注释
		// $db = $f3->get('DB');
		// $uModel = new \DB\SQL\Mapper($db,'user');
		// $users = $uModel->select('*');
		// var_dump($users);

		$f3->set("mailSuf","qq.com");
		echo Template::instance()->render('application/test.htm');
	}

	//学撸bootstrap
	function learnbs($f3){
		echo Template::instance()->render('learn/learnbs.html');
	}

	//处理验证邮件
	function reg($f3){
		$db       = $f3->get('DB');
        $user    = new \DB\SQL\Mapper($db, 'user');
        $user_id = $_GET['uid'];
        $user->load(array('user_id=?',$user_id));
        $user->status = 1;
        $user->update();
      	echo "您的邮箱已认证~";

	}

	//新密码更新
	function handleResetpw($f3){
		$db      = $f3->get('DB');
        $user    = new \DB\SQL\Mapper($db, 'user');

        $newpw = $_GET['newpw'];
        $user_id = $_GET['uid'];
        $user->load(array('user_id=?',$user_id));
        $user->password = $newpw;
        $user->update();
        echo "您的密码已重置";
	}

	//重置密码
	function resetpw($f3){
        $user_id = $_GET['uid'];
        $f3->set('uid',$user_id);
        echo Template::instance()->render('application/resetpw.html');
	}

	//验证指定用户
	function verify($f3){
		$db       = $f3->get('DB');
        $user    = new \DB\SQL\Mapper($db, 'user');
        $res = $user->find(array('nick_name=?','peng'));
        $email = $res[0]['email'];
        $user_id = $res[0]['user_id'];
        $password = $res[0]['password'];
        $url = 'http://footprint.com/reg?uid='.$user_id.'&password='.$password;
        $message = "<a href=".$url.">点我验证</a>";
        $subject = "注册验证";
        $this->sendmail($email,$message,$subject);
	}

	//忘记密码
	function forgetpw($f3){
		$db       = $f3->get('DB');
        $user    = new \DB\SQL\Mapper($db, 'user');
        $res = $user->find(array('nick_name=?','peng'));
        $email = $res[0]['email'];
        $user_id = $res[0]['user_id'];
        $password = $res[0]['password'];
        $url = 'http://footprint.com/resetpw?uid='.$user_id.'&password='.$password;
        $message = "<a href=".$url.">点我重置密码</a>";
        $subject = "重置密码";
        $this->sendmail($email,$message,$subject);
	}

	//发送邮件给指定邮箱
	function sendmail($email,$message,$subject){
		$smtp = new SMTP ( 'smtp.163.com', '465', 'ssl', 'footprint@deeponder.com', '197808hkhl');
		$smtp->set('From','"FootPrint" <footprint@deeponder.com>');
		$smtp->set('Subject',$subject);
		$smtp->set('To','<'.$email.'>');
		$smtp->set('content-type','text/html');
		$smtp->send($message);
		
	}
}