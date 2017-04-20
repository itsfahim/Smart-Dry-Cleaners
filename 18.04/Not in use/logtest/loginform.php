<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
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
  <a href="HomePage.html">Home</a>
  <a href="Shirts.html">Clothes</a>
  <a href="FAQ's.html">FAQ</a>
  <a href="Stores.html">Contact/Location</a>
  <a href="SignUp.html">Sign Up</a>
  <a href="talkToTailor.html">Ask Us</a>
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
      <h1 class="title"><a href="HomePage.html">Smart Dry Cleaners</a> </h1>
    </div></header>
    
	</div>

<form action="logtest.php" method="POST">
   <label> Username: <br>
    <input type="text" name="username" placeholder="john123" style="width: 35%" required>
   </label>
   <br>
   <label> Email: <br>
    <input type="email" name="email" placeholder="john@john.com" style="width: 35%" required>
   </label>
	
	<input type="submit" name="submit" value="Enter" style="width:120px " class="Submit">
  </form>
</body>
</html>