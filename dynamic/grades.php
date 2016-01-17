<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<title>成绩</title>
	<style type="text/css">
		@import url(../css/template.css);
		@import url(../css/grades.css);
	</style>
	<script type="text/javascript" src="../js/grades.js"></script>
</head>
	<?php
		include_once("../method/getVar.php");
		$conn=mysql_connect("localhost","root","password") or die("连接MySQL数据库服务器失败！".mysql_error());
    	$s1= mysql_query("set names utf8");
 		mysql_select_db("Miao",$conn);
 		$result = array();
 		$temp = array();
 		$table= array();
 		$result = mysql_query("select * from Grades",$conn) or die('数据库查询失败');
 		
 		$datanum = mysql_num_rows($result);
 		for ($i=1; $i<=$datanum ; $i++) { 
 			$temp = mysql_fetch_array($result,MYSQL_NUM);
 			$table[$i-1][0]= $temp[1];
 			$table[$i-1][1] = $temp[2];
 		}

		if(!empty(_post("lesson"))){
			$row = _post("id");
			$lesson = _post("lesson");
			$_grade = _post("grade");
			mysql_query("update Grades set grade = $_grade where lesson_name='$lesson'", $conn) or die('更改数据库失败');
			$table[$row][1] = $_grade;
			}
 		
 		mysql_close($conn);
	?>

<body>
	<div id="topnav">
		<ul id="usermenu">
			<li>你好
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
							<a href='grades.php?logout=true'>退出</a>
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
		
		<div class = "main">
			<table id="table_grades" >  
				<tr ><th colspan="3" class="table-title">2015 - 2016 学 年 秋 季 学 期 成 绩</th></tr>
				<tr>
					<td class = "id_num">序号</td>
					<td class="lesson_name">课程名</td>
					<td class="grades">成绩</td>
				</tr>
				
				<?php

					for ($id=0; $id < $datanum; $id++) { 
						if(isset($_SESSION["login_user"])){
						echo "<tr> <td>$id</td> <td>";
						$lesson = $table[$id][0];
						$grade = $table[$id][1];						
						echo $lesson;
						//$id为课表实际行数－１
						echo "</td><td><button title='点击更改分数' class='td_setgrade' type='button' onClick="."Grade($id,'$lesson')>";
						echo $grade;
						echo "</button></td></tr>";							
						}
						else{
						echo "<tr> <td>$id</td> <td>";
						echo $table[$id][0];
						echo "</td>"."<td>";
						echo $table[$id][1];
						echo "</td></tr>";
						}	
					}
					
				?>
				
				<tr>
					<td colspan=5 class="foot_row">
						<font size="2"><center><button class='td_setgrade' type='button' onClick="Grade('Java编程设计')">最终解释权归喵星人所有</button></center></font>
					</td>
				</tr>
			</table>
		</div>
		
		<div id="toTop">
			<a href="#">▲</a>
			<a href="#footer">▼</a>
		</div>
	</div>
	<div>
		<h3>查看评论或者发表留言请到首页～</h3>
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
			
