<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller{
    public function _initialize() {
        $token = I('token');
        $UserModel = D('User');
        $status = $UserModel->checkLogin($token);
        if ($status == 'ERROR') {
            $this->error('登录超时,请重新登录', '/bk/Admin/Oper/login', 1);
        }
    }
}