<?php
namespace Admin\Model;
use Think\Model;
class TeamModel extends Model{
	//展示所有领导团队
	public function getTeamList(){
		$team = M("team");
		return $team->select();
	}
	//根据ID删除对应数据
	public function deleteTeamByid($id){
		$team = M("team");
		$res = $team->where("id = '".$id."'")->delete();
		return $res;
	}
	//增加领导团队
	public function addTeamSubmit($teamInfo){
		$team = M("team");
		$team->add($teamInfo);
		return success;
	}

	//编辑团队
	public function editTeamSubmit($teamInfo){
		$team = M("team");
		$result = $team->save($teamInfo);
	}
	public function getTeamByID($id){
		$team = M("team");
		$res = $team->where("id = '".$id."'")->select();
		return $res;
	}

	public function getUsernameByToken($token){
		$user = M("team");
		return $user->where("token = '".$token."'")->getField('name');

	}
}