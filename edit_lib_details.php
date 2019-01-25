<?PHP
	session_start();
	$state = $_SESSION['state'];
	$slevel = $_SESSION['slevel'];
	if($state=="logged_in"&&($slevel==1||$slevel==2))
	{
		$con = new mysqli("localhost","root","","lib_man");
		$roll = $_GET['id'];
		$com = "select * from librarians where lid=$roll;";
		$res = mysqli_query($con,$com);
		$row = mysqli_fetch_array($res);
?>

<html>
<head>
	<title> 
		Edit Details : <?PHP echo $roll;?>
	</title>
	<link rel="stylesheet" type="text/css" href="style/common.css">
	<link rel="stylesheet" type="text/css" href="style/display_lists.css">
</head>

<body>
	<center>
	<div class="main_div">
		<div style="padding:240px 0;">
			<div class="hr"></div>
			<table>
				<tr>
					<th> Librarian ID </th>
					<th> Name </th>
					<th> Address </th>
					<th> Phone </th>
					<th> E-Mail </th>
					<th> Username </th>
					<th> Password </th>
					<th> Delete/Edit </th>
				</tr>
				<tr>
					<td> <?PHP echo $row[0] ?> </td>
					<td> <?PHP echo $row[1] ?> </td>
					<td> <?PHP echo $row[2] ?> </td>
					<td> <?PHP echo $row[3] ?> </td>
					<td> <?PHP echo $row[4] ?> </td>
					<td> <?PHP $com = "select cid from credentials where lid = $roll";
								$res2 = mysqli_query($con,$com);
								$row2 = mysqli_fetch_array($res2);
								echo $row2[0]; ?> </td>
					<td> </td>
<?PHP
	if(isset($_POST['return']))
		header('location:display_lib.php');
	else if(isset($_POST['change_pass']))
	{
		echo "<script>window.open('edit_tool_pass.php?userid=$row[0]','_blank','height=300px, width=300px, left=300px, top=100px, scrollbars=0, titlebar=0');</script>";
	}
	else if(isset($_POST['edit'])&&isset($_POST['choice']))
	{
		$field_type = $_POST['choice'];
		$id = $row[0];
		echo "<script>window.open('edit_tool.php?dbtype=librarians&id=$id&field_type=$field_type','_blank','height=300px, width=300px,left=300px,top=100px,scrollbars=0,titlebar=0');
				</script>";

	}
	else if(isset($_POST['delete']))
	{
		echo "<script> window.open('confirm_delete.php?dbtype=teachers&id=$roll','_blank','height=300px,width=300px,left=300px,top=100px,scrollbars=0,titlebar=0'); </script>";
	}
?>				
				<form method="post">
					<td> <input type="submit" name="delete" value="Delete Librarian"> </td>
				</tr>
				<tr>
					<td> <input type="radio" name="choice" value="lid"></td>
					<td> <input type="radio" name="choice" value="lname"></td>
					<td> <input type="radio" name="choice" value="laddress"></td>
					<td> <input type="radio" name="choice" value="lphone"></td>
					<td> <input type="radio" name="choice" value="lmail"></td>
					<td> </td>
					<td> <input type="submit" name="change_pass" value="Change Password"> </td>
					<td> <input type="submit" name="edit" value="Edit Detail"> </td>
				</tr>
			</table>
			<br><br>
			<div class="hr"></div>
			<input type="submit" name="return" value="Return to List">
			<div class="hr"></div>
		</div>
	</div>
	</center>
</body>

<?PHP 
	}
	else
	{
		session_destroy();
		header('location:login.php?code=1');
	}
?>