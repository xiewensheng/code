<?php
namespace Admin\Controller;
use Think\Controller;
class TeamController extends Controller {
	
	public function _initialize() {
        $token = $_GET['token'];
        $UserModel = D('User');
        $status = $UserModel->checkLogin($token);
        if ($status == 'ERROR') {
            $this->error('登录超时,请重新登录', '/bk/Admin/Oper/login', 1);
        }
    }

	//管理团队页面
	public function teamInfo($token){
		$this->assign("token",$token);
		$teamModel = D("team");
		$teamList = $teamModel->getTeamList();
		$this->assign("teamList",$teamList);
		$this->display("./Application/Admin/View/leaderManage.html");
	}

	//删除团队
	public function teamDelete($id,$token){
		$this->assign("token",$token);
		$teamModel = D("team");
		$res = $teamModel ->deleteTeamByid($id);
		if($res){
			$this->SUCCESS('删除成功！','/bk/Admin/Team/teamInfo/token/'.$token,1);
		}
		else{
			$this->ERROR('删除失败！','/bk/Admin/Team/teamInfo/token/'.$token,3);
		}
	}

	//添加团队页面
	public function addTeamPage($token){
		$this->assign("token",$token);
		$this->display("./Application/Admin/View/addLeader.html");
	}


	//添加团队
	public function addTeam($token){
		$this->assign("token",$token);
		$teamModel = D("Team");
		// $teamInfo['name']=I('leaderName');
		// $teamInfo['position']=I('leaderPos');
		// $teamInfo['header']=I('leaderHeader');
		// $teamInfo['intro']=I('leaderIntro');
		// $result = $teamModel->addTeamSubmit($teamInfo);

		$upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize   =     3145728 ;// 设置附件上传大小
	    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	 	$upload->autoSub   =	 false;
	    $upload->rootPath  =      './Application/Admin/Public/Uploads/'; // 设置附件上传根目录
	    // 上传单个文件 
	    $info   =   $upload->uploadOne($_FILES['leaderHeader']);
	    if(!$info) {// 上传错误提示错误信息
	        $this->error($upload->getError());
	    }else{// 上传成功 获取上传文件信息
	        $teamInfo['name']=I('leaderName');
			$teamInfo['position']=I('leaderPos');
			$teamInfo['header']=$info['savename'];
			$teamInfo['intro']=I('leaderIntro');
			$result = $teamModel->addTeamSubmit($teamInfo);
		}

		if($result=='success')
		$this->success('添加成功','/bk/Admin/Team/teamInfo/token/'.$token,1);
		else
		$this->error('添加失败','/bk/Admin/Team/teamInfo/token/'.$token,3);
	}

	public function editTeamPage($id,$token){
		$this->assign("token",$token);
		$teamModel = D("Team");
		$teamInfo = $teamModel->getTeamByID($id);
		$this->assign("teamInfo",$teamInfo);	
		$result = $teamModel->editTeamSubmit($teamInfo);
		$this->display("./Application/Admin/View/editLeader.html");
	}

	public function editTeam($id,$token){
		$this->assign("token",$token);
		$teamModel = D("Team");
		$teamInfo = $_POST;
		$teamInfo['id'] = $id;
		// $teamInfo['name']=I('leaderName');
		// $teamInfo['position']=I('leaderPos');
		// $teamInfo['header']=I('leaderHeader');
		// $teamInfo['intro']=I('leaderIntro');
		$upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize   =     3145728 ;// 设置附件上传大小
	    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	 	$upload->autoSub   =	 false;
	    $upload->rootPath  =      './Application/Admin/Public/Uploads/'; // 设置附件上传根目录
	    // 上传单个文件 
	    $info   =   $upload->uploadOne($_FILES['leaderHeader']);
	   
	    $teamInfo['name']=I('leaderName');
		$teamInfo['position']=I('leaderPos');
		
		$teamInfo['intro']=I('leaderIntro');

	    if($info) {// 上传错误提示错误信息
	    	$teamInfo['header']=$info['savename'];
	    }else{
	    	$this->error($upload->getError());
	    }
		$teamModel->editTeamSubmit($teamInfo);
		$this->success('编辑成功','/bk/Admin/Team/teamInfo/token/'.$token,1);
	}
}