<?php

class PWManageController{


	function getSepw($f3)
	{
		$recordId = $f3->get('GET.recordId');
		$sepw = $f3->get('GET.sepw');
		$db = $f3->get('DB');
		$record = new \DB\SQL\Mapper($db,'records');
		$re = $record->find(array('id=? and sepw=?',$recordId,$sepw));
		$data[0] = $recordId;
		if (!$re) {
			$data[1] = 0;
		}else{

			$data[1] = $re[0]['password'];
		}
		echo json_encode($data);
	}

	function edit($f3)
	{
		// session_start();
		// $uid = $_SESSION['user_id'];
		$editid = $f3->get('POST.editid');
		$site = $f3->get('POST.site');
		$username = $f3->get('POST.username');
		$remarks = $f3->get('POST.remark');
		$pw = $f3->get('POST.pw');
		$db = $f3->get('DB');
		$record = new \DB\SQL\Mapper($db,'records');
		$record->load(array('id=?',$editid));
		$record->web_site =$site;
		$record->user_name = $username;
		$record->password = $pw;
		$record->remarks = $remarks;
		$re = $record->update();
		
		echo json_encode($re);
	}

	//添加记录
	function addRecord($f3)
	{
		session_start();
		$uid = $_SESSION['user_id'];
		$site = $f3->get('POST.site');
		$username = $f3->get('POST.username');
		$pw = $f3->get('POST.pw');
		$sepw = $f3->get('POST.sepw');
		$remarks = $f3->get('POST.remark');

 		$db = $f3->get('DB');
		$record = new \DB\SQL\Mapper($db,'records');
		$record->user_id = $uid;
		$record->web_site = $site;
		$record->user_name = $username;
		$record->password = $pw;
		$record->sepw = $sepw;
		$record->remarks = $remarks;
		$re = $record->save();

		echo json_encode($re);
	}

	//删除记录
	function delRecord($f3)
	{
		$delid = $f3->get('GET.delid');
		$db = $f3->get('DB');
		$record = new \DB\SQL\Mapper($db,'records');
		$record->load(array('id=?',$delid));
		$re = $record->erase();
		echo json_encode($re);
	}

	//搜索
	function search($f3)
	{
		$site = $f3->get('POST.site');
		$db = $f3->get('DB');
		$record = new \DB\SQL\Mapper($db,'records');
		$records = $record->find(array('web_site=?',$site));
        $f3->set('list',$records);
        echo Template::instance()->render('application/search.html');
	}

}