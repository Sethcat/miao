<!--文件上传实例-->
<!--为了能正确运行，请在本文件的同目录下新建一文件夹，名为“upfile”-->

<html>
<head>
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>==文件上传实例==</title>
<style>
body{font-size:10pt};
td{font-size:10pt};
.style1 {color: #FF0000}
.style2 {
	color: #000000;
	font-weight: bold;
}
</style>
</head>
<body>
<div align="center">
</div>
  <form  enctype="multipart/form-data" action="#" method="post">
  <!--此处一定要有enctype="multipart/form-data"//-->
  <table width="486" height="103" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#008080" id="AutoNumber1" style="border-collapse: collapse">
    <tr bgcolor="#CCCCCC">
      <td height="30" colspan="2" align="right"><div align="center" class="style2">文件上传实例</div>      </td>
    </tr>
    <tr>
      <td width="103" height="45" align="right"><div align="center"><span class="style1">*</span>文件上传地址：</div></td>
      <td width="377" height="45"><input type="file" name="file_name">
      （大小〈2M 为宜）</td>
    </tr>
    <tr>
      <td height="33" align="right" colspan="2">
      <p align="center"><input type="submit" value="上传" name="add">
        &nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="重置" name="B2"></td>
    </tr>
  </table>
</form>
</body>
</html>
