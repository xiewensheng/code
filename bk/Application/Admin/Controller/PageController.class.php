<?php
namespace Admin\Controller;
use Think\Controller;

class PageController extends Controller {
    public function _initialize() {
        $token = $_GET['token'];
        $UserModel = D('User');
        $status = $UserModel->checkLogin($token);
        if ($status == 'ERROR') {
            $this->error('登录超时,请重新登录', '/bk/Admin/Oper/login', 1);
        }
    }

    public function pageIndex() {
        $this->assign("token",I("token"));
        $this->display('./Application/Admin/View/index.html');
    }

    public function pageInfo(){
        $this->assign("token",I("token"));
        $model = D('Page');
        $info = $model->Showphoto();
        $this->assign('info',$info);
        // dump($info);
        $this->display('./Application/Admin/View/index.html');
    }
    public function updateInfo($token){
        $this->assign("token",$token);
        $model = D('Page');

        $upload = new \Think\Upload();
        $upload->maxSize = 3145728;  
        $upload->rootPath = './';
        $upload->savePath = 'Application/Admin/Public/Uploads/';
        $upload->autoSub = false;
        $upload->saveRule = funiqid;
        $upload->uploadReplasce = true; 
        $upload->allowExts = array('jpg','jpeg','png','gif');  
        $upload->allowTypes = array('image/png','image/jpg','image/jpeg','image/gif');
        $upload->thumb = true;
        $upload->thumbMaxWidth ='300,500';
        $upload->thumbMaxHeight = '200,400';
        $upload->thumbPrefix = 's_,m_';
        $upload->thumbRemoveOrigin =1;
        $info = $upload->upload();
        if(!$info) {
                $this->error($upload->getError());
            }else{
                if($info){
                    $model = D('Page');
                    $indeximg['key'] = 'INDEX_IMG';
                    $indeximg['value'] = $info['INDEX_IMG']['savename'];
                    $res[0] = $model->dbupdate($indeximg);
                    $extendimg['key'] = 'EXTEND_IMG';
                    $extendimg['value'] = $info['EXTEND_IMG']['savename'];
                    $rel[1] = $model->dbupdate($extendimg);
                } else {
                    $this->error("wen",3);
                }
             }


             $indextitle['key'] = 'INDEX_TITLE';
             $indextitle['value'] =I('index_title');
             $res[2] = $model->dbupdate($indextitle);

             $indextext['key'] = 'INDEX_TEXT';
             $indextext['value'] = I('index_text');
             $res[3] = $model->dbupdate($indextext);

             $extendtitle['key'] = 'EXTEND_TITLE';
             $extendtitle['value'] = I('extend_title');
             $res[4] = $model->dbupdate($extendtitle);

             $extendtext['key'] = 'EXTEND_TEXT';
             $extendtext['value'] = I('extend_text');
             $res[5] = $model->dbupdate($extendtext);

             $issuccess = true;
             foreach($res as $status){
                if(!$status){
                   $issuccess = false;
                }
             }
             if($issuccess){
                $this->success('添加成功','/bk/Admin/Page/pageInfo/token/'.$token,1);
             } else {
                $this->error('添加失败','/bk/Admin/Page/pageInfo/token/'.$token,3);
             }
    }
}