<?php 

 $connect = new mysqli ('localhost', 'root', 'root' ,'form' );

 if ($connect -> connect_error){
	 die('connection failed');
 } echo "connected successfully";  


 $username = $_POST["username"];  
 $email =  $_POST["email"];  
 $sql_query =   "select username from forminfo where username like '$username' and email like '$email';";  
 $result = mysqli_query($connect,$sql_query);  
 if(mysqli_num_rows($result) >0 )  {  
 $row = mysqli_fetch_assoc($result);  
 $username =$row["username"];
 echo "Welcome ".$username;  
 }  
 else  
 {   
 echo "Login Failed.......Try Again..";  
 }  
?>  