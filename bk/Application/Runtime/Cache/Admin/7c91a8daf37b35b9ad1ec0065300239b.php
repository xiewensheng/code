<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="Zh">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="/bk/Application/Admin/Public/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/bk/Application/Admin/Public/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/bk/Application/Admin/Public/css/style.css" />
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
						<p>Welcome <?php echo ($user['username']); ?> ！</p>	
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
						<li><a href="/bk/Admin/Page/pageInfo/token/<?php echo ($token); ?>">页面管理</a></li>
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
						<li class="active">团队管理</li>
					</ol>
				</div>
				<div class="oprateBar">
					<a class="btn btn-sm btn-default" href="/bk/Admin/Team/addTeamPage/token/<?php echo ($token); ?>"><i class="fa fa-plus"></i>添加</a>
					<!-- <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>批量删除</button> -->
				</div>
				<div class="List">
					<table class="table table-bordered">
						<tr>
							<td>姓名</td>
							<td>职位</td>
							<td>介绍</td>
							<td>操作</td>
						</tr>
						<?php if(is_array($teamList)): $i = 0; $__LIST__ = $teamList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$team): $mod = ($i % 2 );++$i;?><tr>						
							<td><?php echo ($team['name']); ?></td>
							<td><?php echo ($team['position']); ?></td>
							<td><?php echo ($team['intro']); ?></td>
							<td>
								<a class="btn btn-info btn-sm" href="http://localhost/bk/Admin/Team/editTeamPage/id/<?php echo ($team["id"]); ?>/token/<?php echo ($token); ?>"><i class="fa fa-edit"> </i> 编辑</a>
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target=".deleteBox"><i class="fa fa-trash"> </i> 删除</button>
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>		
					</table>
					
				</div>
			</div>
		</div>
	</div>

	<!--删除确认-->
	<div class="modal fade deleteBox" tabindex="-1" role="dialog" aria-labelledby="">
	  <div class="modal-dialog modal-sm">
	  	<div class="modal-content">
	  		<div class="modal-header">正在执行删除操作</div>
	  		<div class="modal-body">是否删除？</div>
	  		<div class="modal-footer">	
       			<a class="btn btn-info" href="http://localhost/bk/Admin/Team/teamDelete/id/<?php echo ($team["id"]); ?>/token/<?php echo ($token); ?>">确认</a>
       			<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
	  		</div>
	  	</div>
	  </div>
	</div>
</body>
<script src="/bk/Application/Admin/Public/js/jquery-2.1.1.js"></script>
<script src="/bk/Application/Admin/Public/js/bootstrap.js"></script>
</html>