<?PHP
	session_start();
	$state = $_SESSION['state'];
	$slevel = $_SESSION['slevel'];
	if($state=='logged_in' && ($slevel==1 || $slevel==2))
	{
		$id = $_GET['userid'];
		$con = new mysqli("localhost","root","","lib_man");
?>

<html>
<head>
<title>	Change Password , ID : <?php echo $id ?> </title>
</head>

<body bgcolor="black" style="color:white">

<center>
	<?php
	if(isset($_POST['change']))
		{
			$new_data = $_POST['new_data'];
			if($slevel==1)
			{
					$new_pass = md5($_POST['new_data']);
					
					if($id!=0)
						$com = "update credentials set cpass = '$new_pass' where lid = $id;";
					else
						$com = "update credentials set cpass = '$new_pass' where lid = NULL;";
					
					if(mysqli_query($con,$com))
						echo "<script>
								alert('$field_type Successfully Changed.');
								var parent_window = window.opener.location.pathname+'?id=$id';
								window.onunload = window.opener.location.assign(parent_window);
								window.close();
								</script>";
					else
						echo "<script> document.getElementById('alert_area').innerHTML = 'Type in right data!'; </script>";
			}
		}
	?>
	<form method="post">
		Enter new password = <input type="password" name="new_data"><br><br>
		<input type="submit" name="change" value="Change"> <input type="submit" name="close" value="Close" onclick="window.close()">
	</form>
	<span id="alert_area" style="color:lightred"></span>
</center>

</body>

</html>

<?php

	}
	else
	{
		session_destroy();
		header('location:login.php?code=1');
	}

?>

