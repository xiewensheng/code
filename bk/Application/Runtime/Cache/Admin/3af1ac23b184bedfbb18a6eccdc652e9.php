<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>博克集团后台管理系统</title>

<meta name="viewport" content="width=device-width">

<link href="/bk/Application/Admin/Public/css/login.css" rel="stylesheet" type="text/css">

</head>
<body>

<div class="login">
	<form action="http://localhost:81/bk/Admin/Oper/doLogin" method="post" id="form">
		<div class="logo"></div>
		
		<div class="login_form">
			<div class="user">
				<input class="text_value" value="" name="username" type="text" id="username" placeholder="用户名">
				<input class="text_value" value="" name="password" type="password" id="password" placeholder="密码">
			</div>
			<button class="button" id="submit" type="submit">登录</button>
		</div>
	
		<div id="tip"></div>
		
		<div class="foot">Copyright &copy; 2015.博克集团 All rights reserved.</div>
	</form>
</div>
</body>
</html>