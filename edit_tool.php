<?PHP
	session_start();
	$state = $_SESSION['state'];
	$slevel = $_SESSION['slevel'];
	if($state=='logged_in' && ($slevel==1 || $slevel==2))
	{
		$dbtype = $_GET['dbtype'];
		$field_type = $_GET['field_type'];
		$id = $_GET['id'];
		$con = new mysqli("localhost","root","","lib_man");
?>

<html>
<head>
<title>	Edit <?php echo "$dbtype $field_type $id"; ?> </title>
</head>

<body bgcolor="black" style="color:white">

<center>
	<?php
	if(isset($_POST['change']))
		{
			$new_data = $_POST['new_data'];
			if($slevel==1)
			{

				if($dbtype == 'librarians')
				{
					$com = "update $dbtype set $field_type = '$new_data' where lid = $id;";
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
			if($slevel==1 || $slevel==2)
			{
				$com = "";
				switch($dbtype)
				{
					case 'teachers':
						$com = "update $dbtype set $field_type = '$new_data' where tid = $id;";
						break;
					case 'students':
						$com = "update $dbtype set $field_type = '$new_data' where sid = $id;";
						break;
					case 'books':
						$com = "update $dbtype set $field_type = '$new_data' where bid = $id;";
						break;
				}
				if(mysqli_query($con,$com))
				{
					echo "<script>
								alert('$field_type Successfully Changed.');
								var parent_window = window.opener.location.pathname+'?id=$id';
								window.onunload = window.opener.location.assign(parent_window);
								window.close();
								</script>";
				}
				else
						echo "<script> document.getElementById('alert_area').innerHTML = 'Type in right data!'; </script>";
			}
		}
	?>
	<form method="post">
		Enter new <?php echo $field_type; ?> = <input type="text" name="new_data"><br><br>
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

