<?php
namespace Admin\Model;
use Think\Model;
use Common\Common\CommonUtil;
/**
* 
*/
class PageModel extends Model
{
    public function Showphoto(){
        $info = CommonUtil::Selectphoto();
        return $info;
    }
    
    public function dbupdate($info){
        
        $status = CommonUtil::dbwrite($info);
        if($status){
            return true;
        } else {
            return false;
          }
     }
}