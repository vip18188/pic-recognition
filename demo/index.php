<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>图片识别</title>
</head>
<body>
	<form action="action.php" method="post" enctype="multipart/form-data">
		<select name="type"> 
			<option value="1">通用文字(不含位置信息)</option> 
			<option value="2">通用文字(含文字位置信息)</option>
			<option value="3">身份证</option> 
			<option value="4">银行卡</option> 
			<option value="5">网图OCR</option> 
			<option value="6">生僻字</option>
			<option value="7">行驶证</option> 
			<option value="8">驾驶证</option>
			<option value="9">车牌</option> 
		</select> 
		<input type="file" value="" name="file">
		<input type="submit" value='提交'>
	</form>
</body>
</html>