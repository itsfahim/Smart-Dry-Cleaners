<?php

session_start();

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Update</title>
<style>
	
	@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}</style>
<link href="css/multiColumnTemplate.css" rel="stylesheet" type="text/css">
	</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="Welcome.php">Home</a>
  <a href="shoppingHomepage.php">Clothes</a>
  <a href="update.php">Update</a>
  <a href="talkToTailor.php">Talk to Us</a>
  <a href="Stores.html">Location</a>
  <a href="Timetable.html">Timetable</a>
  <a href="FAQ's.html">FAQ</a>
  
</div>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
}
</script>

<div class="container">
  <header>
  
  <button onclick="openNav().style.display='block'" style="width: auto">&#9776;</button>

<div class="primary_header">
      <h1 class="title">Smart Dry Cleaners</h1>
    </div></header>
	  </div>
	  
	  
	  <div class="underPageTitle">
	  
	  <?php

 $connect = new mysqli ('localhost', 'root', 'root' ,'dry' );

 if ($connect -> connect_error){
	 die('connection failed');
 } echo "Updates loaded! <br>";  
 $username = $_SESSION['username'];
 $sql_query =   "SELECT username, stage, trans_id FROM updates WHERE username='$username'";  
		  
 $result = mysqli_query($connect,$sql_query);  
		 
     // output data of each row
if (mysqli_num_rows($result) > 0) {
     // output data of each row
     while($row = mysqli_fetch_assoc($result)) {
         echo "Your transaction id is: " . "<b>".$row["trans_id"]."</b>". " and is at stage " . "<b>".$row["stage"]."</b>". "<br>";
     }
} else {
     echo "There are no orders at this moment in time.";
};
	 
?>
	  </div>
	  
	  <div class="maps">
	  <br>
	  
<div id="Stage1" class="tabcontent">
  <h3>Stage 1</h3>
  <p>A delivery van is on the way to your house.</p>
</div>

<div id="Stage2" class="tabcontent">
  <h3>Stage 2</h3>
  <p>Your items have arrived at the store and are now being processed.</p> 
</div>

<div id="Stage3" class="tabcontent">
  <h3>Stage 3</h3>
  <p>The items have finished being processed and the final touches are being applied.</p>
</div>

<div id="Stage4" class="tabcontent">
  <h3>Stage 4</h3>
  <p>The items are ready. For deliveries: The items will now be heading back to you.</p>
</div>

<button class="tablink" onclick="stages('Stage1', this, 'lightblue')" id="defaultOpen">Stage 1</button>
<button class="tablink" onclick="stages('Stage2', this, 'lightcoral')">Stage 2</button>
<button class="tablink" onclick="stages('Stage3', this, 'lightgray')">Stage3</button>
<button class="tablink" onclick="stages('Stage4', this, 'lightgreen')">Stage4</button>
<br>
	<p>Note: If your stage is showing <b>0</b>. The order is being processed and the status will change once in action.</p>

	</div>

<script>
function stages(cityName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(cityName).style.display = "block";
    elmnt.style.backgroundColor = color;

}
// What is opened by default
document.getElementById("defaultOpen").click();
</script>
    
    
<style>

.tablink {
    background-color: darkslategray;
    color: white;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    font-size: 17px;
    width: 25%;
}

.tablink:hover {
    background-color: #777;
}

/* Style the tab content */
.tabcontent {
    color: white;
    display: none;
    padding: 50px;
    text-align: center;
}

#Stage1 {background-color:lightblue;}
#Stage2 {background-color:lightcoral;}
#Stage3 {background-color:lightgray;}
#Stage4 {background-color:lightgreen;}
</style>
	  
	  
	  
	  
	  
</body>
</html>

