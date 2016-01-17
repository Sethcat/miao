<!DOCTYPE html>
<html lang="zh-CN">  
<head> 
	<meta charset="utf-8">
	<title>欢迎来到喵星球～</title>
	<style type="text/css">
		@import url(css/template.css);
		@import url(css/index.css);
	</style>
	<script type="text/javascript" src="/js/index.js"></script>
</head>
<body>
	<div id="topnav">
		<ul id="usermenu">
			<li>你好</li>
			<li>
				<a href="dynamic/register.php">
				<?php 
					//消除未定义变量php提示的warning
					include_once("method/getVar.php");		
					session_start();
					if (_get("logout")){
							$_SESSION["login_user"]=null;
							echo "<a href='dynamic/register.php'>新会员注册</a></li>
							<li>
							<a href='dynamic/login.php'>登陆</a>";
					}
					elseif(!empty( $_SESSION["login_user"] )){
    					echo $_SESSION["login_user"]."</a>
							</li>
						<li>
							<a href='index.php?logout=true'>退出</a>
						";
						
					}
					else{
						echo "新会员注册</a>
							</li>
						<li>
							<a href='dynamic/login.php'>登陆</a>
						";
					}
					echo "</li>";
				?>
		</ul>
	</div>
	<div id="page">
		<div id="header">
			<a href="#" id="title" title="回到首页->喵星球!"><img src="Home.png"></a>
			<div id="mencontainer">
				<ul id="menu" class="topmenu">
					<li>
						<a href="dynamic/aboutme.php" class="section">Aboutme</a> 
					</li>
					<li>
						<a href="dynamic/schedule.php" class="section">Schedule</a> 
					</li>
					<li>
						<a href="dynamic/grades.php" class="section">Grades</a> 
					</li>
				</ul>
			</div>
		</div>	
		<div id="main" class="clearfix">
			<div class="row">
				<div id="preview">
					<h1 class="title">走走停停，诗酒在远方</h1>
					<img src="pic/future.png"/>
				</div>
			</div>
			<div id="Commenlist">
				<div class="subheader">
					<h1>评论</h1>
				</div>
				<div id="comment">
			
					<?php
//To refresh the latest data first
			$comment = _post("Comment");
			$id=mysql_connect("localhost","root","5720828sq")  or die("连接MySQL数据库服务器失败！".mysql_error());
    		$s1= mysql_query("set names utf8");
 			mysql_select_db("Miao",$id);
 			$code = mt_rand(0,1000000);
			if(isset($_POST['originator'])) {
    			if( ($_POST['originator'] == $_SESSION['code']) && (!empty(_post("Comment"))) ){
        			// 处理该表单的语句，省略
        			 $author = "Anonymous";
 					 $add_time = date('y-m-d H:i:s');
     				 $sqlinsert="INSERT INTO `Miao`.`Comment` (`id`, `author`, `addtime`, `content`, `reply`) VALUES (NULL, '$author', '$add_time', '$comment', '')";
      				 $excu=mysql_query($sqlinsert,$id) or die('Insert failure');
	      			 if ($excu){
      					echo "Comment successfully!";
      				  }
      				 else{
      					echo "failed!";
      					echo $add_time;
      					}
    				   }
    				 else{
        				echo '请不要刷新本页面或重复提交表单！';
	    				}
      			}
      		$_SESSION['code'] = $code;

//Show the latest comment here
  $query="SELECT * FROM Comment";
  $result=mysql_query($query,$id) or die("查询失败failed");
  $totalnum=mysql_num_rows($result);
  $pagesize=5;
  $page=_get("page");
  if($page==""){
    $page=1;
  }
  $begin=($page-1) * $pagesize;
  $totalpage=ceil($totalnum/$pagesize);

  echo "<table  rules='rows'  class = 'comment_table' width=200><tr><th class='comment-author'></th><th class='comment-time'></th><th class='comment-content'></th></tr>";
  $datanum=mysql_num_rows($result);
  echo "共有".$totalnum."条留言。";
  echo "每页显示".$pagesize."条，共".$totalpage."页<br>";
  echo "当前第".$page."页";
  for($j=1;$j<=$totalpage;$j++){
   echo "<a href= index.php?page=".$j.">[".$j."]&nbsp;</a>";
  }
  $query="SELECT * FROM `Comment` ORDER by addtime DESC limit $begin,$pagesize";
  $result=mysql_query($query,$id);  
  for($i=1;$i<=$pagesize;$i++){
   $info=mysql_fetch_array($result,MYSQL_ASSOC);
   if (!$info) break;
   echo "<tr><td>".$info['author']."</td><td>";
   echo $info['addtime']."：";
   echo "</td><td>".$info['content']."</td></tr>";
   }
  echo "</table>";
  mysql_close($id);
?>
				</div>
				<div class="row reply-item">
				</div>
				<h2>我要留言</h2>
				<div id="CommenForm">
					<form action="index.php"  method="post">
						<textarea cols="60" id="Content" name="Comment" rows="5"></textarea>
						<br/>
						<input type="submit" value="提交" class="btn-submit">
						<input type="hidden" name="originator" value="<?=$code?>">
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
			
