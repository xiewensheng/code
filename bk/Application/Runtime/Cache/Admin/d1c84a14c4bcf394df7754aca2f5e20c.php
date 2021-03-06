<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="Zh">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="/bk/Application/Admin/Public/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/bk/Application/Admin/Public/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/bk/Application/Admin/Public/css/style.css" />
	
	<script type="text/javascript" src="/bk/Application/Admin/Public/js/upload.js"></script>
	<title>博克集团后台管理系统</title>
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-9 headLeft">
						<h1>博克集团后台管理系统</h1>
					</div>
					<div class="col-md-3 headRight">
						<p>Welcome Admin ！</p>	
					</div>		
				</div>
			</div>
		</div>
	</div>
	

	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="adminSideBar">
					<ul>
						<li><a href="">页面管理</a></li>
						<li><a href="">基本管理</a></li>
						<li class="select"><a href="/bk/Admin/Team/teamInfo/token/<?php echo ($token); ?>">团队管理</a></li>
						<li><a href="">产品管理</a></li>
					</ul>
				</div>
			</div>
<div class="col-md-9 maincontent">
	<div class="breadcrumbox">
		<ol class="breadcrumb">
			<li><a href="#">首页</a></li>
			<li><a href="/bk/Admin/Team/teamInfo/token/<?php echo ($token); ?>">团队管理</a></li>
			<li class="active">编辑</li>
		</ol>
	</div>
	<div class="operateBox clearfixed">
		<form action="/bk/Admin/Team/editTeam/id/<?php echo ($teamInfo[0]['id']); ?>/token/<?php echo ($token); ?>" method="post" enctype="multipart/form-data">
			<div class="form-group col-md-6">
				<label for="leaderName">姓名</label>
				<input type="text" class="form-control" name="name" value="<?php echo ($teamInfo[0]['name']); ?>">
		    </div>
			<div class="form-group col-md-6">
				<label for="leaderPos">职位</label>
				<input type="text" class="form-control" name="position" value="<?php echo ($teamInfo[0]['position']); ?>">
		    </div>
			<div class="form-group col-md-12">
				<label for="leaderIntro">简介</label>
				<input type="text" class="form-control" name="intro" value="<?php echo ($teamInfo[0]['intro']); ?>">
		    </div>
			<div class="form-group col-md-6">
				<label for="leaderHeader">头像</label>
				<input type="file" class="form-control" name="leaderHeader" onchange="previewImage(this)" accept="image/*" />
		    </div>
			<div id="preview">
				<img id="imghead" src="/bk/Application/Admin/Public/Uploads/<?php echo ($teamInfo[0]['header']); ?>">
			</div>
		
			<div class="buttonBar col-md-3">
				<button  type="submit" class="btn btn-info btn-block">提交</button>
			</div>
		</form>
	</div>
</div>
		</div>
	</div>
</body>
</html>