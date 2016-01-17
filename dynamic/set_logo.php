<!DOCTYPE html>
<html>
<head>
	<title>更改头像</title>
</head>
<body>
		<form  enctype="multipart/form-data" action="parse_file.php" method="post">
			<input type="file" name="file_name">
			<input type="submit" value="上传" name="add">
			<input type="hidden" value= <?php 
				include_once("../method/getVar.php");
				$url = _get("url");
				echo $url; ?>
				name = "url">
	</form>
</body>
</html>
