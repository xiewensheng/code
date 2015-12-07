<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>upload</title>
    <meta http-equiv = " content-type " content = " text/html; charset=UTF-8 " />
</head>
<body>
    <!-- <?php if(is_array($filelist)): $i = 0; $__LIST__ = $filelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>脨隆脥录拢潞<img src="/bk/Public/Upload/s_<?php echo ($vo['filename']); ?>" /><br />  
      麓贸脥录拢潞<img src="/bk/Public/Upload/m_<?php echo ($vo['filename']); ?>" /><br /><?php endforeach; endif; else: echo "" ;endif; ?>  --> 
      
    <form action="http://localhost:81/bk/Admin/UpLoad/updateInfo" method="post" enctype="multipart/form-data">  
        <input type="file" name="file[]" /><br />
        <input type="file" name="file[]" /><br />
        <input type="text" name="index_title"><br />
        <input type="text" name="index_text"><br />
        <input type="text" name="extend_title"><br />
        <input type="text" name="extend_text"><br />
        <input type="submit" value="上传">
    </form>
    <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><table>
            <tr>
                <td><?php echo ($vo['key']); ?>:</td>
                <td><?php echo ($vo['value']); ?>:</td>
            </tr>
        </table><?php endforeach; endif; else: echo "" ;endif; ?>
</html>