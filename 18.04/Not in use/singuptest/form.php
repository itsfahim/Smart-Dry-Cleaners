<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>


<?php 

$connect = new MySQLi ('localhost', 'root', 'root', 'form') or die ('connection not successful');

if ($connect -> connect_error){
	die('connection failed');
} echo "connected";

$username= $_POST['username'];
$email= $_POST['email'];
$address= $_POST['address'];
$postcode= $_POST['postcode'];

$sql="INSERT INTO forminfo VALUES('$username', '$email', '$address', '$postcode')";
 
 if($connect ->query ($sql) === TRUE){
	 echo "<br>new record added";
	 
	 $information = fopen("form.txt", "a");
	 $info= "username: ". "$username". "\r\nemail: ". "$email". "\r\nadress: ". "$address"
			."\r\npostcode: ". "$postcode"."\r\n\r\n";
			
	 fwrite($information, $info);
	 
 }else{
	 echo "error";
 }

?>