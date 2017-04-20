<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Talk to Us</title>
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
  <a href="Clothes.html">Clothes</a>
  <a href="updateform.php">Update</a>
  <a href="talkToTailor.html">Talk to Us</a>
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
	  
	 <br>
	  <div class="pageTitle">	  
	  	Talk to the tailor:
	  </div>
	  <br>
		<div class="underPageTitle">
			Use this feature to communicate directly with the tailor. Post a comment along with your name and then hit post. He will then get back to you as soon as possible. Keep checking back to see your response without ever having to call in. 
		<hr>
		</div>		
		
		<br>
		
		
<div class="commentSection">		
		 <form action="talkToTailor.php" method="POST">
   <label> Name: <br>
    <input type="text" name="Name" class="Input" style="width: 35%" required>
   </label>
   <br><br>
   <label> Comment: <br>
    <textarea name="Comment" class="Input" style="width: 100%" required></textarea>
   </label>
   <br><br>
   <input type="submit" name="Submit" value="Submit Post" style="width:120px " class="Submit">
  </form>
  </div>
  <?php
 
 if(isset($_POST['Submit'])){
  print "<h1>Your comment has been submitted!</h1>";

  $Name = $_POST['Name'];
  $Comment = $_POST['Comment'];

  #Get old comments
  $old = fopen("comments.txt", "r+t");
  $old_comments = fread($old, 1024);

  #Delete everything, write down new and old comments
  $write = fopen("comments.txt", "w+");
  $string = "<b>".$Name."</b><br>".$Comment."<br>\n".$old_comments;
  fwrite($write, $string);
  fclose($write);
  fclose($old);
 }

 #Read comments
 $read = fopen("comments.txt", "r+t");
 echo "<br><br>Comments<hr>".fread($read, 1024);
 fclose($read);

?>
</body>
</html>


