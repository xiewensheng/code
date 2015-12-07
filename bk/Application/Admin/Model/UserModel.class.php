<?php
namespace Admin\Model;
use Think\Model;
use Common\Common\CommonUtil;

class UserModel extends Model {

    /**
     * @param $user 用户数组 ['username'] ['password']
     * @return mixed 返回结果数组 ['status'] ['token']
     */
    public function login($user) {
        if (empty($user['username']) || empty($user['password'])) {
            $res['status'] = 'ERROR';
            return $res;
        } else {
            $User = M('user');
            $dbUser = $User->where("username='".$user['username']."'")->select()[0];
            if (md5($user['password']) == $dbUser['password']) {
                $res['status'] = 'SUCCESS';
                $res['token'] = CommonUtil::guid();
                $dbUser['token'] = $res['token'];
                $dbUser['time_update'] = time();
                $User->save($dbUser);
                return $res;
            } else {
                $res['status'] = 'ERROR';
                return $res;
            }
        }
    }

    public function checkLogin($token) {
        $User = M("user");
        $dbUser = $User->where("token='".$token."'")->select()[0];
        if (time() - $dbUser['time_update'] > 30*60) {
            return 'ERROR';
        }
        return 'SUCCESS';
    }
}