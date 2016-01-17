<!DOCTYPE html>
<html lang="zh-CN">  
<head> 
	<meta charset="utf-8">
	<title>课 程 表</title>
	<style type="text/css">
		@import url(../css/template.css);
		@import url(../css/schedule.css);
	</style>
	<script type="text/javascript" src="../js/schedule.js"></script>
</head>
<body>
	<div id="topnav">
		<ul id="usermenu">
			<li>你好</li>
			<li>
				<?php 
					include("../method/getVar.php");
				//从数据库读取课程表					
 				$id=mysql_connect("localhost","root","password") or die("连接MySQL数据库服务器失败！".mysql_error());
    			$s1= mysql_query("set names utf8");
 				mysql_select_db("Miao",$id);
 				$result = array();
 				$temp = array();
 				$table= array();

 				for($i=1;$i<6;$i++){
 					//Index-1  **********
 					$result[$i] = mysql_query("select * from Schedule where weekday=$i",$id) or die('数据库查询失败');
 					$temp = mysql_fetch_array($result[$i],MYSQL_NUM);
 					for ($r=1; $r < 5; $r++) { 
 					$table[$i-1][$r-1] = $temp[$r];
 					}
 				}
 				
 				//更改数据库课程记录
					$row = null;
					$col = null;
					if(!empty(_post("new_lesson"))){
						$update = _post("new_lesson");
						$row = _post("time");
						$col = _post("weekday");
						$table[$col-1][$row-1] = $update;
						mysql_query("update Schedule set lesson$row = '$update' where weekday=$col", $id) or die('更改数据库失败');
					}
					mysql_close($id);
					//消除未定义变量php提示的warning		
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
			<a href="../index.php" id="title" title="点击回到首页->喵星球!"><img src="../pic/Home.png"></a>
			<div id="mencontainer">
				<ul id="menu" class="topmenu">
					<li>
						<a href="aboutme.php" class="section">Aboutme</a> 
					</li>
					<li>
						<a href="#" class="section">Schedule</a> 
					</li>
					<li>
						<a href="grades.php" class="section">Grades</a> 
					</li>
				</ul>
			</div>
		</div>	
		<div id="main" class="clearfix">
			<div class="row">
			   <div id="preview">		
				<table id = "table-1" align="center">
				<tr><th colspan="6">
					<pre>2015 - 2016　秋 季 学 期 课 程 表 <pre></th></tr>
                 <tr class="weekday">   
				   <td width="10" class="th_num">id</td>
                   <td class = "th_weekday">星期一</td>
                   <td class = "th_weekday">星期二</td>
                   <td class = "th_weekday">星期三</td>
				   <td class = "th_weekday">星期四</td>
				   <td class = "th_weekday">星期五</td>
                 </tr>
				 <?php
				 //Print Schedule talbe 
				 	for ($i=0; $i < 4; $i++) { 
				 		echo "<tr id='row'><td>";
				 		$i_plus = $i+1;
				 		echo $i_plus;
				 		echo "</td>";
				 		for ($r=0; $r < 5; $r++) {
				 			$r_plus = $r+1; 
				 			if(isset($_SESSION["login_user"])){
				 				echo "<td><button title = '点击更改课程' class='button_class' type='button'
				  				onClick='disp_prompt($r_plus,$i_plus)'>".$table[$r][$i]."</button>
				   				</td>";				 				
				 			}
				 			else{
				 				echo "<td><button class='td_view_class' type='botton' disabled = 'true'>".$table[$r][$i]."</button></td>";
				 			}
				 		}
				 		echo "</tr>";
				 	}
				 	
				 ?>
				 <tr height = "10">
					<td></td>
					<td colspan=5>
						<font size="2"><center>最终解释权归喵星人所有</center></font>
					</td>
				 </tr>
				</table>
				</div>
			</div>
			<div id="Commenlist">
				<div class="subheader">
					<h3>查看评论或者发表留言请到首页～</h3>
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
			
