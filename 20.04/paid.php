<?php

session_start("db.php");
?>

<?php


$connect = new mysqli ('localhost', 'root', 'root' ,'dry' );

 if ($connect -> connect_error){
	 die('connection failed');
 } echo "Updates loaded! <br>";  
 $username = $_SESSION['username'];
$sql_query = "INSERT INTO updates (username, stage) VALUES ('$username', '0')";
		  
$result = mysqli_query($connect,$sql_query);
	header("Location: Welcome.php");

?>
