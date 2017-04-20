<?php
session_start();
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Smart Dry Cleaners</title>
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
		 echo "You are logged in as " . $_SESSION["username"] . ".<br>";
		  ?>	
  
	  </div>
<div class="container">	  
	    <section>
    <div class="left_article">
		<h3><b>Smart Dry Cleaners</b></h3>
      <p>We take pride in our work and we want you to take pride in our work too. We have many ways for you to keep track of your cleaning using our update system which will show you when your clothes is ready to be picked up. For more information head to our US page which will have our FAQ's.</p>
</div>
  </section>
  
  <div class="row">
    <div class="columns">
      <p class="thumbnail_align"><a href="Clothes.html"><img src="images/smart1.png" alt="" class="thumbnail"/></a> </p>
      <h4>Clothes</h4>
      <p>The clothes section has all the <b>Clothes</b> we provide a service for. Add the items to your basket and once it is complete we will send a van over to your place for a pick up that very same day.</p>
    </div>
    <div class="columns">
      <p class="thumbnail_align"><a href="Stores.html"><img src="images/Stores1.png" alt="" class="thumbnail"/></a> </p>
      <h4>Location/Timetable</h4>
      <p>We have the location of all our shops in an easy to use Google Maps on the <b>Location</b> page. On the <b>Timetable</b> page you can find the opening times for the stores. </p>
    </div>
    <div class="columns">
      <p class="thumbnail_align"><a href="updateform.php"> <img src="images/update1.png" alt="" class="thumbnail"/></a> </p>
      <h4>Update</h4>
      <p>Not sure about when to collect your clothes or when to expect delivery? Use our <b>Update</b> page to know exactly when. </p>
    </div>
    <div class="columns">
      <p class="thumbnail_align"><a href="talkToTailor.php"> <img src="images/Talktous1.png" alt="" class="thumbnail"/></a> </p>
      <h4>Talk to Us</h4>
      <p> <b>Talk to Us</b> is so that you can communicate with the tailor regarding problems you may have. Just leave your name a message and we'll get back to you as soon as we can. </p>
    </div>
    
  </div>
	</div>
</body>
</html>