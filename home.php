<?PHP
	if(isset($_POST['login']))
	{
		header('location:login.php?code=0');
	}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style/common.css">
		<title>
			Home Page
		</title>
	</head>
	<body>
	<center>
	<div class="main_div">
		<br>
		<h1> Home Page </h1>
		<div class="hr"></div>
		<br>
		<form method="post">
			<input type="submit" name="login" value="Admin/Librarian Login">
		</form>
		<div class="hr"></div>
	</div>
	</center>
	</body>
</html>

