<?php 
  
$connect = new mysqli ('localhost', 'root', 'root' ,'dry' );

 if ($connect -> connect_error){
	 die('connection failed');
 } echo "connected successfully";

$username= $_POST['username'];
$email= $_POST['email'];
$password= $_POST['password'];
$line1= $_POST['line1'];
$line2= $_POST['line2'];
$postcode= $_POST['postcode'];
$sql = "INSERT INTO customers VALUES ('$username', '$email', '$password' , '$line1','$line2', '$postcode')";

 
	 if($connect ->query ($sql) === TRUE){
	 	 
		 header("location: login.php");
	 
 }

?>


------------------------


