<html>
    <head>
        <title>
            Login
        </title>
		<link rel="stylesheet" type="text/css" href="style/common.css">
    </head>
    <body>
		<center>
			<div class="main_div">
<?PHP
    $con = new mysqli("localhost", "root", "", "lib_man");
    $code = $_GET['code'];
    switch($code)
    {
        case 1:
            echo "<h5 color=red align=center> Please login first! </h5>";
            break;
        case 2:
            echo "<h5 color=red align=center> Logout successful! </h5>";
    }
    if(isset($_POST['login']))
    {
        $username = $_POST['username'];
        
        $password = md5($_POST['password']);

        $com = "select * from credentials where cid='$username' and cpass='$password'";
        $result = mysqli_query($con,$com);
        if($row=mysqli_fetch_array($result))
        {
            $user_type= $row[3];
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['state'] = "logged_in";
            if($user_type=="admin")
            {
                $_SESSION['slevel'] = 1;
                header("location:admin_home.php");
            }
            else if($user_type=="librarian")
            {
                $_SESSION['slevel'] = 2;
                header("location:lib_home.php");
            }
            else
                echo "<h5 color=red align=center> Corrupt Account Configuration </h5>";
        }
        else
            echo "<h5 color=red align=center> Invalid USERNAME/PASSWORD </h5>";
    }
	else if(isset($_POST['home']))
	{
		session_destroy();
		header("location:home.php");
	}
?>
			<div style="padding:40px 25px;background:rgba(128, 64, 0,0.5);width:600px;height:200px;border-radius:50px;border:1px solid black;margin:160px 0">
			<h1> Library Management System </h1>
            <form method="post">
                <h4> Username : <input type="text" name="username"></h4>
                <h4> Password : <input type="password" name="password"></h4>
                <input type="submit" name="login" value="Login">
				<input type="submit" name="home" value="Return to Home">
            </form>
			</div>
			</div>
		</center>
    </body>
</html>

