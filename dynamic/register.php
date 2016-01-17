<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<title>新会员注册</title>
	<link rel="stylesheet" type="text/css" href="../css/register.css" />
	<script type="text/javascript" src="../js/register.js"></script>

</head>

<body>
	<div id="topnav">
		<ul id="usermenu">
			<li>你好</li>
			<li>
				<a href="#">新会员注册</a>
			</li>
			<li>
				<a href="login.php">登陆</a>
			</li>
		</ul>
	</div>
	<div id="page">
		<div id="header">
			<a href="../index.php" id="title" title="点击回到首页->喵星球!"><img src="../pic/Home.png"></a>
			<div id="mencontainer">
				<ul id="menu" class="topmenu">
					<li>
						<a href="aboutme.php" class="section">Aboutme</a> 
					</li>
					<li>
						<a href="schedule.php" class="section">Schedule</a> 
					</li>
					<li>
						<a href="grades.php" class="section">Grades</a> 
					</li>
				</ul>
			</div>
		</div>	

		<div id="main" class="clearfix">
			<div class="row">
				<div class="span12">
					<h1>喵星球新会员注册</h1>
				</div>
			</div>
			<div id="row">
				<div class="span9">
					<form action="register.php" method="post" onsubmit="Unknown">
						<div class="form-horizontal">
							<fieldset>
								  <legend>新会员注册 - 请填写以下各项</legend>
								<div class="control-group">
									<div class="label">
										<label class="control-label" for="UserName">登录名</label>
									</div>
									<div class="controls">
										<input name="UserName" type="text" value>
										<span class="help-inline">18位以内的字母、数字、汉字。</span>
									</div>
								</div>
								
								<div class="control-group">
									<div class="label">
										<label class="control-label" for="Email">Email</label>
									</div>
									<div class="controls">
										<input name="Email" type="text" value>
										<span class="help-inline">请输入正确邮箱，以便通过验证</span>
									</div>
								</div>
								
								<div class="control-group">
									<div class="label">
										<label class="control-label" for="Password">密 码</label>
									</div>
									<div class="controls">
										<input name="Password" type="password" value>
										<span class="help-inline">至少6位字符</span>
									</div>
								</div>
								
								<div class="control-group">
									<div class="label">
										<label class="control-label" for="ConfirmPassword">确认密码</label>
									</div>
									<div class="controls">
										<input name="ConfirmPassword" type="password" value>
										<span class="help-inline"></span>
									</div>
								</div>
								
								<div class="control-group">
									<div class="label">
										<label class="control-label" for="captcha">验证码</label>
									</div>
									<div class="controls">
										<img id="captchaImage" src="../pic/check.png">
										<br>
									</div>
								</div>
								<div class="Captcha">
									<input name="Captcha" type="text" value>	
								</div>								
								<div class="control-group">
									<div class="Checkbox">
										<label class="checkbox" for="Agree">
											<input type="checkbox" id="Agree" name="Agree">
											我自愿加入喵星球
											<a href="/article/protol" target="_blank">协议</a>
										</label>
									</div>
								</div>
								<br/>
								<div class="form-actions">
									<input type="submit" class="btn-submit" value=" 注册 " onclick="checkform()">
								</div>
	<?php
	include("../method/getVar.php");
	if (_post("UserName"))
	{
		//echo "POST data exist";
    $id=mysql_connect("localhost","root","5720828sq")  or die("连接MySQL数据库服务器失败！".mysql_error());
    $s1= mysql_query("set names utf8");
 	mysql_select_db("Miao",$id);
    $result = mysql_query("select * from MiaoAccount",$id) or die('数据库查询失败');
    $datanum=mysql_num_rows($result);
    echo $datanum;
    if ($datanum==1){
      echo "<script>{
      window.alert('您已经注册，请登录');
      location.href='../dynamic/login.php';}
      </script>";     
    }
  
    else{
      $name = $_POST["UserName"];
      $passwd = $_POST["Password"];
      $email = $_POST["Email"];
      $sqlinsert="INSERT INTO MiaoAccount VALUES(1,1,'$name','$email','$passwd',1)";
      $excu=mysql_query($sqlinsert,$id) or die('Insert failure');
      //echo $excu;
      mysql_close($id);
      if($excu){
        
        echo "<script> {
          window.alert('注册成功');
          location.href ='../index.php';} 
          </script>";  
      }
      else{

          echo "<script> {
          window.alert('注册失败,重新跳转到注册页面');
          }
          </script>";

      }
  }
  
}

?>						
							</fieldset>
						</div>
					</form>
				</div>
			</div>
			
		</div>
		<div id="toTop">
			<a href="#">▲</a>
			<a href="#footer">▼</a>
		</div>
	</div>
	
	<div id="footer">
		<div class="container">
			
			<ul id="footmenu">
				<p>喵星球工作室 ·  All Rights Reserved </p>
				<li>说明</li>
				<li>请联系我</li>
			</ul>
		</div>
	</div>
	
</body>
</html>
			
