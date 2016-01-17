<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<title>登陆</title>
	<link rel="stylesheet" type="text/css" href="../css/login.css" />
	<script type="text/javascript" src="../js/login.js"></script>
</head>


<body>
	<div id="topnav">
		<ul id="usermenu">
			<li>你好</li>
			<li>
				<a href="register.php">新会员注册</a>
			</li>
			<li>
				<a href="#">登陆</a>
			</li>
		</ul>
	</div>
	<div id="page">
		<div id="header">
			<a href="../index.php" id="title" title="点击回到首页->喵星球!"><img src="../Home.png"></a>
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
					<h1> Log in</h1>
				</div>
			</div>
			<div id="row">
				<div class="span9">
					<form action="login.php" method="post" onsubmit="Unknown">
						<div class="form-horizontal">
							<fieldset>
								 <!-- <legend>新会员注册 - 请填写以下各项</legend>  -->
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
										<label class="control-label" for="Password">密 码</label>
									</div>
									<div class="controls">
										<input name="Password" type="password" value>
										
									</div>
								</div>
								
								<div class="control-group">
									<div class="label">
										<label class="control-label" for="captcha">验证码</label>
									</div>
									<div class="controls">
										<img id="captchaImage" src="../pic/Captcha/check.png">
										<br>
									</div>
								</div>
								<div class="Captcha">
									<input name="Captcha" type="text" value>	
								</div>								
		
								<br/>
								<div class="form-actions">
									<input type="submit" class="btn-submit" value=" 登 录 ">
								</div>
								<br>
								<?php
									//消除未定义变量php提示的warning
									include_once("../method/getVar.php");	
									if (_post("UserName")){
									$id=mysql_connect("localhost","root","5720828sq")  or die("连接MySQL数据库服务器失败！".mysql_error());
    								mysql_query("set names utf8");
 									mysql_select_db("Miao",$id);
 									$postname = _post("UserName");
    								$result=mysql_query("select passwd from MiaoAccount where name = '$postname'",$id) or die('数据库查询失败');
    								$pwd_array = mysql_fetch_array($result,MYSQL_ASSOC);
    								$dbpasswd = $pwd_array["passwd"];
    								if (_post("Password")==$dbpasswd){
    									mysql_query("UPDATE 'MiaoAccount' SET 'login' = 1 WHERE 'name' = '$postname'");
    									session_start();
										$_SESSION["login_user"] = _post("UserName");
    									header("Location: ../index.php");
    								}
    								else{
    									echo "用户名密码不正确";
    								}
								}
								else{

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
			
