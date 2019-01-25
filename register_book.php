<?PHP
    session_start();
    $con = new mysqli("localhost","root","","lib_man");
    $state= $_SESSION['state'];
    $slevel = $_SESSION['slevel'];
    if($state=="logged_in" && ($slevel==1||$slevel==2))
    {
        if(isset($_POST['submit']))
        {
            $roll = $_POST['bid'];
			$name = $_POST['name'];
            $bcopies = $_POST['bcopies'];

            $com = "insert into books(bid, bname, bcopies) values ('".$roll."','".$name."','".$bcopies."')";
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
            Register a Book
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
                Book ID : <input type="text" name="bid"><br><br>
                Book Name : <input type="text" name="name"><br><br>
                Book Copies : <input type="text" name="bcopies"><br><br>
				<br><br><div class="hr"></div>
                <input type="submit" name="submit" value="Save Details">
                <input type="submit" name="return" value="Return to Home">
				<div class="hr"></div>
                
            </form>
        </center>
		</div>
    </body>
</html>
