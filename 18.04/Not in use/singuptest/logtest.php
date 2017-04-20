<?php
include('connection.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: homepage.html");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Form in PHP with Session</title>
</head>
<body>
<div id="main">
<h1>PHP Login Session Example</h1>
<div id="login">
<h2>Login Form</h2>
<form action="" method="post">
<label>UserName :</label>
<input id="name" name="username" placeholder="username" type="text">
<label>Email :</label>
<input id="email" name="email" placeholder="**********" type="email">
<input name="submit" type="submit" value=" Login ">
<span><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>