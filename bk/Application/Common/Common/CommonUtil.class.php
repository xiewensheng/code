<?php
namespace Common\Common;
class CommonUtil {
    public static function guid() {
        $charid = strtoupper(md5(uniqid(mt_rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = //chr(123).// "{"
            substr($charid, 0, 8) . $hyphen
            . substr($charid, 8, 4) . $hyphen
            . substr($charid, 12, 4) . $hyphen
            . substr($charid, 16, 4) . $hyphen
            . substr($charid, 20, 12);
        //.chr(125);// "}"
        return $uuid;
    }

    public function dbwrite($info){ 
        $file=M('Page');
        $dbdata['key'] = $info['key'];
        $dbdata['value'] = $info['value'];
        $file->save($dbdata);
        $dbinfo = $file->where($dbdata)->find();
        if($dbinfo['value'] == $info['value']){
            return true;
        } else {
            return false;
        }
    }

    public function Selectphoto(){
        $oldphoto = M('Page');
        $photoinfo = $oldphoto->select();
        return $photoinfo;
    }
}