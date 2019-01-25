<?PHP
    session_start();
    $con = new mysqli("localhost","root","","lib_man");
    $state= $_SESSION['state'];
    $slevel = $_SESSION['slevel'];
    if($state=="logged_in" && ($slevel==1||$slevel==2))
    {
        if(isset($_POST['submit']))
        {
            $roll = $_POST['tid'];
			$name = $_POST['name'];
			$address = $_POST['address'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];

            $com = "insert into teachers(tid, tname, taddress, tphone, tmail) values ('".$roll."','".$name."','".$address."','".$mobile."','".$email."')";
            $con->query($com);
        }
        else if(isset($_POST['return']))
            header("location:lib_home.php");
    }
    else
    {
        session_destroy();
        header("location:login.php?code=1");
    }
 ?>

<html>
    <head>
        <title>
            Register a Teacher
        </title>
		<link rel="stylesheet" type="text/css" href="style/common.css">
    </head>
    <body>
        <div class="main_div">
		<center>
            <h1> Details : </h1>
			<div class="hr"></div>
			<br><br>
            <form method="post">
                Teacher ID : <input type="text" name="tid"><br><br>
                Name : <input type="text" name="name"><br><br>
				Address : <input type="text" name="address"><br><br>
                Mobile Number : <input type="text" name="mobile"><br><br>
                E-Mail ID : <input type="text" name="email"><br><br>
				<br><br><div class="hr"></div>
                <input type="submit" name="submit" value="Save Details">
                <input type="submit" name="return" value="Return to Home">
				<div class="hr"></div>
                
            </form>
        </center>
		</div>
    </body>
</html>
