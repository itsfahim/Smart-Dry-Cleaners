<?php 
  
$connect = new mysqli ('localhost', 'root', 'root' ,'sessions' );

 if ($connect -> connect_error){
	 die('connection failed');
 } echo "connected successfully";

$username= $_POST['username'];
$email= $_POST['email'];
$address= $_POST['address'];
$postcode= $_POST['postcode'];
$sql = "INSERT INTO test VALUES ('$username', '$password' '$email', '$address', '$postcode')";

 
	 if($connect ->query ($sql) === TRUE){
	 	 
		 header("location: loginform.php");
	 
 }else{
	 echo "Could not sign up 0.o ";
 }

?>


------------------------


