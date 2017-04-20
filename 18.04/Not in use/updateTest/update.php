<?php

 $connect = new mysqli ('localhost', 'root', 'root' ,'form' );

 if ($connect -> connect_error){
	 die('connection failed');
 } echo "connected successfully"; 
 $username = $_POST["username"];  
 $email =  $_POST["email"]; 
 $sql_query =   "SELECT ordNo from uptest where email like '$email';";  
 $result = mysqli_query($connect,$sql_query);  
 if(mysqli_num_rows($result) >0 )  {  
 $row = mysqli_fetch_assoc($result);  
 $ordNo =$row["ordNo"];
 echo "Your order number is: ".$ordNo;  
 }  
 else  
 {   
 echo "Login Failed.......Try Again..";  
 }  
?>  



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update</title>
</head>

<body>
</body>
</html>