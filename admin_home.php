<?PHP
    session_start();
    $username = $_SESSION['username'];
    $state = $_SESSION['state'];
    $slevel = $_SESSION['slevel'];
    if($state=="logged_in" && $slevel==1)
    {   if(isset($_POST['lib_reg']))
            header("location:register_lib.php");
        else if(isset($_POST['lib_list']))
            header("location:display_lib.php");

        else if(isset($_POST['lib_func']))
            header("location:lib_home.php");

        else if(isset($_POST['logout']))
        {   session_destroy();
            header("location:login.php?code=2");
        }
    }
    else
    {   session_destroy();
        header("location:login.php?code=1");
    }


 ?>

<html>
    <head>
        <title>
            Administrator Home
        </title>
		<link rel="stylesheet" type="text/css" href="style/common.css">
    </head>
    <body>
        <center>
			<div class="main_div">
			<h1> Admin Home </h1>
            <h4> Welcome <?PHP echo $username; ?></h4>
            <div class="hr"></div>
			<br><br>
            <form method="post">
                <input type="submit" name="lib_reg" value="New Librarian Registration">
                <input type="submit" name="lib_list" value="Display Librarian List">
                <br><br><br><div class="hr"></div><br><br><br>
                <input type="submit" name="lib_func" value="Librarian Functions">
                <br><br><br><div class="hr"></div><br><br>
                <input align="right" type="submit" name="logout" value="Logout"></input>
            </form>
			<br><div class="hr"></div>
			</div>
		</center>
    </body>
</html>
