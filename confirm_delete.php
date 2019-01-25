<?php
	session_start();
	$state = $_SESSION['state'];
	$slevel = $_SESSION['slevel'];
	if(!($state="logged in" && ($slevel==1||$slevel==2)))
	{
		session_destroy();
		header('location:login.php?code=1');
	}
	else
	{
		$id = $_GET['id'];
		$dbtype = $_GET['dbtype'];
		if(isset($_POST['yes']))
		{
			$con = new mysqli("localhost","root","","lib_man");
			$com = "delete from $dbtype where $dbtype[0]"."id = $id;";
			mysqli_query($con,$com);
			echo "<script>
						alert('Entry Successfully deleted!');
						var parent_window = window.opener.location.pathname+'?id=$id';
						window.onunload = window.opener.location.assign(parent_window);
						window.close();
					</script>";
		}
		else if(isset($_POST['no']))
		{
			echo "<script> alert('Seems like you changed your mind!');
						window.close();
					</script>";
		}
	}
?>

<html>
<head>
<title>	Delete id : <?php echo $id; ?> </title>
</head>

<body bgcolor="black" style="color:white">
<center>
	<h2> Are you sure you want to delete ? </h2>
	<form method="post">
		<input type="submit" name="yes" value="YES">        <input type="submit" name="no" value="NO">
	</form>	
</center>
</body>

</html>