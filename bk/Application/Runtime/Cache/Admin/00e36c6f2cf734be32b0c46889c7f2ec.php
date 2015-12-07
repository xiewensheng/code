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
                        <li><a href="/bk/Admin/Page/pageInfo/token/<?php echo ($token); ?>">页面管理</a></li>
                        <li><a href="">基本管理</a></li>
                        <li><a href="/bk/Admin/Team/teamInfo/token/<?php echo ($token); ?>">团队管理</a></li>
                        <li><a href="">产品管理</a></li>
                    </ul>
                </div>
            </div>
<div class="col-md-9 maincontent">
    <div class="breadcrumbox">
        <ol class="breadcrumb">
            <li><a href="#">首页</a></li>
            <li><a href="/bk/Admin/Page/pageInfo/token/<?php echo ($token); ?>">页面管理</a></li>
            <li class="active">增加</li>
        </ol>
    </div>
    <div class="operateBox clearfixed">
        <form action="/bk/Admin/Page/updateInfo/token/<?php echo ($token); ?>" method="post"  enctype="multipart/form-data">
            <div class="form-group col-md-6">
                <label for="INDEX_TITLE">INDEX_TITLE</label>
                <input type="text" class="form-control" name="INDEX_TITLE" placeholder="INDEX_TITLE">
            </div>
            <div class="form-group col-md-6">
                <label for="INDEX_TEXT">INDEX_TEXT</label>
                <input type="text" class="form-control" name="INDEX_TEXT" placeholder="INDEX_TEXT">
            </div>
            <div class="form-group col-md-6">
                <label for="EXTEND_TITLE">EXTEND_TITLE</label>
                <input type="text" class="form-control" name="EXTEND_TITLE" placeholder="EXTEND_TITLE">
            </div>
            <div class="form-group col-md-6">
                <label for="EXTEND_TEXT">EXTEND_TEXT</label>
                <input type="text" class="form-control" name="EXTEND_TEXT" placeholder="EXTEND_TEXT">
            </div>
            <div class="form-group col-md-6">
                <label for="INDEX_IMG">INDEX_IMG</label>
                <input type="file" class="form-control" name="INDEX_IMG" onchange="previewImage(this)" accept="image/*" />
            </div>
            <div id="preview">
                <img id="imghead" src="/bk/Application/Admin/Public/images/image.png">
            </div>

            <div class="form-group col-md-6">
                <label for="EXTEND_IMG">EXTEND_IMG</label>
                <input type="file" class="form-control" name="EXTEND_IMG" onchange="previewImage(this)" accept="image/*" />
            </div>
            <div id="preview">
                <img id="imghead" src="/bk/Application/Admin/Public/images/image.png">
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