<script type="text/javascript" src="../js/link.js"></script>
<?php
    session_start();
    include_once("../method/getVar.php");
    $domain_url = _get("url");
    $redirect_url = $domain_url.".php";

if (_post("add")=="上传"){
       $filename = "logo";
       if(empty($_FILES['file_name']['name'])){  
	   			 //$_FILES['file_name']['name']为获取客户端机器文件的原名称
           echo "文件名不能为空";
           exit;
           }
       $oldfilename=$_FILES['file_name']['name'];
       echo "<br>原文件名为：".$oldfilename;       
       $filetype=substr($oldfilename,strrpos($oldfilename,"."),strlen($oldfilename)-strrpos($oldfilename,"."));
       echo "<br>原文件的类型为：".$filetype;
       if(($filetype!='.jpg')&&($filetype!='.png')&&($filetype!='.gif')&&($filetype!='.bmp')){
          echo "<script>alert('文件类型或地址错误');</script>";
          echo "<script>location.href='".$redirect_url."' ;</script>";
          exit;
          }
       echo "<br>上传文件的大小为（字节）：".$_FILES['file_name']['size'];
	   			//$_FILES['file_name']['size']为获取客户端机器文件的大小，单位为B
       if ($_FILES['file_name']['size']>1000000) {
           echo "<script>alert('文件太大，不能上传');</script>";
          echo "<script>location.href='".$redirect_url."';</script>";
          exit;
           }
       echo "<br>文件上传服务器后的临时文件名为：".$_FILES['file_name']['tmp_name'];
					//取得保存文件的临时文件名（含路径）
       $filename=$filename.$filetype;
       echo "<br>新文件名为：".$filename;       
       $savedir="../upload_file/".$filename;
       if(move_uploaded_file($_FILES['file_name']['tmp_name'],$savedir)){
            $file_name=basename($savedir);       //取得保存文件的文件名（不含路径）
            echo "<br>文件上传成功！保存为：".$savedir;
           }else{
             echo "<script language=javascript>";
             echo "alert('错误，无法将附件写入服务器!\n本次发布失败！');";
             echo "location.href='".$redirect_url."';";
             echo "</script>";
             exit;
         }       
    }
?>
<script type='text/javascript'> 
              go(3, 'aboutme.php') 
            </script>"