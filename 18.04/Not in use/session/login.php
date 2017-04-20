<?php
    session_start();


    if(isset($_POST['login'])) {
        include_once("db.php");
        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);

        $username = stripslashes($username);
        $password = stripslashes($password);
        
        $username = mysqli_real_escape_string($db, $username);
        $password = mysqli_real_escape_string($db, $password);

        $sql = "SELECT * FROM test WHERE username='$username'";
        $query = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($query);
        $username = $row['username'];
        $db_password = $row['password'];
		

        if($password == $db_password) {
            $_SESSION['username'] = $username;	
		    header("Location: Welcome.php");
        } else {
            echo "Details are incorrect";
        }

		

    }




	
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>

<link href="css/multiColumnTemplate.css" rel="stylesheet" type="text/css">
	</head>
<body>


<div class="container">
  <header>
<div class="primary_header">
      <h1 class="title">Smart Dry Cleaners</h1>
    </div></header>
    
	</div>
	
    <p></p>
	
	<div class="commentSection">
	<p>Please login to enter the website using your username and email address.</p>

<form action="login.php" method="POST">
   <label> Username: <br>
    <input type="text" name="username" placeholder="john123" style="width: 35%" required>
   </label>
   <br>
   <label> Password: <br>
    <input type="password" name="password" placeholder="**************" style="width: 35%" required>
   </label>
   <br> 
	<br>
	<input type="submit" name="login" value="Login" style="width:120px " class="Login">
  </form>
	</div>
	
	<div class="underPageTitle">
	
	<p><p>If you don't have a login then <a href="SignUp.html"><b><u>click here</u></b></a> to sign up.</p>
	
	</div>
</body>
</html>