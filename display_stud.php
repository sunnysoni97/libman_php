<?PHP
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
	if(isset($_POST['return']))
		header('location:lib_home.php');
}
?>

<html>
<head>
	<title>
		Student List 
	</title>
	<link rel="stylesheet" type="text/css" href="style/common.css">
	<link rel="stylesheet" type="text/css" href="style/display_lists.css">
</head>
<body>
	<div class="main_div">
	<center>
		<table class="large">
			<tr>
				<th> Roll Number </th>
				<th> Name </th>
				<th> Class </th>
				<th> Address </th>
				<th> Phone </th>
				<th> E-Mail </th>
				<th></th>
			</tr>
			<?PHP
				$con = new mysqli("localhost","root","","lib_man");
				$com = "select * from students;";
				$res = mysqli_query($con,$com);
				while($row= mysqli_fetch_array($res))
				{
			?>
			<tr>
			<td> <?PHP echo $row[0] ?> </td>
			<td> <?PHP echo $row[1] ?> </td>
			<td> <?PHP echo $row[2] ?> </td>
			<td> <?PHP echo $row[3] ?> </td>
			<td> <?PHP echo $row[4] ?> </td>
			<td> <?PHP echo $row[5] ?> </td>
			<td style="background-color:rgba(200,0,0,0.7);"> <a href="edit_stud_details.php?id=<?PHP echo $row[0]?>"> Edit Details </a></td>
			</tr>
			<?PHP
			}
			?>
		</table>
		<br><br>
		<div class="hr"></div>
		<form method="post">
			<input type="submit" name="return" value="Return to Menu">
			<div class="hr"></div>
		</form>
	</center>
	</div>
	
</body>


</html>