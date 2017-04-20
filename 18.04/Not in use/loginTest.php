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
	 echo "Welcome ". $row["username"]. "<br> Your Email: ". $row["email"]. ".<br>". "At the address of: <br>". 
			"	". $row["address"]. "<br>". "	". $row["postcode"];
 };
?>  


 $connect = new mysqli ('localhost', 'root', 'root' ,'form' );

 if ($connect -> connect_error){
	 die('connection failed');
 } echo "connected successfully <br>";  
 $username = $_POST["username"];  
 $email =  $_POST["email"]; 
 $sql_query =   "SELECT ordNo, stage from uptest where email like '$email';";  
 $result = mysqli_query($connect,$sql_query);  
		 
     // output data of each row
if (mysqli_num_rows($result) > 0) {
     // output data of each row
     while($row = mysqli_fetch_assoc($result)) {
         echo "Order number: " . "<b>".$row["ordNo"]."</b>". " is at stage " . "<b>".$row["stage"]."</b>". "<br>";
     }
} else {
     echo "0 results";
};