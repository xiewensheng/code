<?php
namespace Admin\Controller;
use Think\Controller;

class OperController extends Controller {
    /**
     * 登录页
     */
    public function login() {
        $this->display('./Application/Admin/View/login.html');
    }

    /**
     * 登录操作
     */
     public function doLogin() {
        $user['username'] = I('username');
        $user['password'] = I('password');
        $UserModel = D('User');
        $res = $UserModel->login($user);
        if ($res['status']=='SUCCESS') {
            $this->redirect('/Admin/Page/pageInfo/token/'.$res['token']);
        } else {
            $this->error('登录失败,请重新登录', '/bk/Admin/Oper/login', 1);
        }
    }
}