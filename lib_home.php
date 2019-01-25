<?PHP
    session_start();
    $username = $_SESSION['username'];
    $state = $_SESSION['state'];
    $slevel = $_SESSION['slevel'];
    if($state=="logged_in" && ($slevel==1||$slevel==2))
    {   if(isset($_POST['stud_reg']))
            header("location:register_stud.php");
        else if(isset($_POST['stud_list']))
            header("location:display_stud.php");
        
        else if(isset($_POST['teacher_reg']))
            header("location:register_teacher.php");
        else if(isset($_POST['teacher_list']))
            header("location:display_teacher.php");
        
        else if(isset($_POST['book_reg']))
            header("location:register_book.php");
        else if(isset($_POST['book_list']))
            header("location:display_book.php");

        else if(isset($_POST['book_issue']))
            //header("location:issue_book.php");
            header("location:lib_home.php");
        else if(isset($_POST['book_return']))
            //header("location:return_book.php");
            header("location:lib_home.php");

        else if(isset($_POST['logout']))
        {   
            if($slevel==1)
            {
                header("location:admin_home.php");
            }
            else
            {
                session_destroy();
                header("location:login.php?code=2");
            }
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
            Librarian Home
        </title>
		<link rel="stylesheet" type="text/css" href="style/common.css">
    </head>
    <body>
        <center>
			<div class="main_div">
			<h1> Librarian Home </h1>
            <h4> Welcome <?PHP echo $username; ?></h4>
            <div class="hr"></div>
			<br><br>
            <form method="post">
                <input type="submit" name="stud_reg" value="New Student Registration">
                <input type="submit" name="stud_list" value="Display Student List">
                <br><br>
                <input type="submit" name="teacher_reg" value="New Teacher Registration">
                <input type="submit" name="teacher_list" value="Display Teacher List">
                <br><br>
                <input type="submit" name="book_reg" value="New Book Registration">
                <input type="submit" name="book_list" value="Display Book List">
                <br><br>
                <input type="submit" name="book_issue" value="Issue a Book">
                <input type="submit" name="book_return" value="Return a Book">
                <br><br><br><div class="hr"></div><br><br>
                <input align="right" type="submit" name="logout" value="Logout"></input>
            </form>
			<br><div class="hr"></div>
			</div>
		</center>
    </body>
</html>
