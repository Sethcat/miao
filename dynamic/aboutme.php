<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<title>自我介绍</title>
	<style type="text/css">
		@import url(../css/template.css);
		@import url(../css/aboutme.css);
	</style>
	<script type="text/javascript" src="../js/register.js"></script>
</head>


<body>
	<div id="topnav">
		<ul id="usermenu">
			<li>你好</li>
			<li>
				<?php
					include_once("../method/getVar.php");
					session_start();
					if (_get("logout")){
						$_SESSION["login_user"]=null;
						echo "<a href='register.php'>新会员注册</a></li>
							<li>
							<a href='login.php'>登陆</a>";
					}
					elseif(!empty( $_SESSION["login_user"] )){
    					echo $_SESSION["login_user"]."</a>
							</li>
						<li>
							<a href='schedule.php?logout=true'>退出</a>
						";
					}	
					else{
						echo "<a href='register.php'>新会员注册</a>
							</li>
						<li>
							<a href='login.php'>登陆</a>
						";
					}
					echo "</li>";								
				?>
		</ul>
	</div>
	<div id="page">
		<div id="header">
			<a href="../index.php" id="title" title="点击回到首页->喵星球!"><img src="../Home.png"></a>
			<div id="mencontainer">
				<ul id="menu" class="topmenu">
					<li>
						<a href="#" class="section">Aboutme</a> 
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
		<div id="main">
			<table align = "center"  >
			<tr>
				<td width="50">&nbsp;</td>
				<th width="150"><a href="set_logo.php?url=aboutme" title="点击更改头像"><img src="../upload_file/logo.jpg" class="portrait"></a></th>
				<td>&nbsp;</td>
				<th>来自北邮的游荡者</th>
			</tr>
			<tr>
				<td width="50">&nbsp;</td>
				<td colspan="3">
				<ul>
					<li><b>Who：</b>小明</li>
					&nbsp;
					<li><b>When: </b>2012年加入北邮大家庭</li>
					&nbsp;
					<li><b>What: </b>最近在考研，被通原虐的死去又爱来</li>
					&nbsp;
					<li><b>How: </b>热情善良，人畜无害，天然自带呆萌</li>
				</ul>
			</td>
			</tr>
			<tr >
			<td width="50">&nbsp;</td>
			<td colspan="3">
				<div id="cont">
					<img src="../pic/starsky.jpg" class="picture">
					<p class="indent">
					<b>简介:</b>&nbsp;93年中国制造，高173cm,净重66公斤，采用人工智能,
					各部分零件齐全，运转稳定，经二十三年运行考验，属信得过产品.现就读于号称“信息黄埔”的北京邮电大学
					的北京邮电大学，即将毕业，希望明天迈出校园能成为母校的骄傲。
					</p>
				</div>
			</td>
		</tr>
		<tr >
			<td width="50">&nbsp;</td>
			<td colspan="3">
				<dl >
					<ul class="list1"><b>自黑时刻</b>
						<li> <a href="#">湖建人</a></li>
						<li> <a href="#">轻度强迫症</a></li>
						<li> <a href="#">多动症晚期患者</a></li>
						<li> <a href="#">不折腾会死喵星人</a></li>
					</ul>
				</dl>
			</td>
		</tr>
		<tr >
			<td width="50">&nbsp;</td>
			<td>&nbsp;</td>
			<td colspan="2" class="return">
				<a href="../index.php">返回主页</a>
			</td>
		</tr>
	</table>
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
			
