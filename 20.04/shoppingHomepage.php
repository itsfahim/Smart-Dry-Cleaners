<?php
session_start();
include_once("config.php");
include_once("db.php");


//current URL of the Page. shoppingUpdate.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
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
<link href="css/style.css" rel="stylesheet" type="text/css">
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
<!-- View Cart Box Start -->
<?php
if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
{
	echo '<div class="cart-view-table-front" id="view-cart">';
	echo '<h3>Your Shopping Cart</h3>';
	echo '<form method="post" action="shoppingUpdate.php">';
	echo '<table width="100%"  cellpadding="6" cellspacing="0">';
	echo '<tbody>';

	$total =0;
	$b = 0;
	foreach ($_SESSION["cart_products"] as $cart_itm)
	{
		$service_name = $cart_itm["service_name"];
		$service_price = $cart_itm["service_price"];
		$service_qty = $cart_itm["service_qty"];
		$service_code = $cart_itm["service_code"];
		$bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
		echo '<tr class="'.$bg_color.'">';
		echo '<td>Qty <input type="text" size="2" maxlength="2" name="service_qty['.$service_code.']" value="'.$service_qty.'" /></td>';
		echo '<td>'.$service_name.'</td>';
		echo '<td><input type="checkbox" name="remove_code[]" value="'.$service_code.'" /> Remove</td>';
		echo '</tr>';
		$subtotal = ($service_price * $service_qty);
		$total = ($total + $subtotal);
	}
	echo '<td colspan="4">';
	echo '<button type="submit" class="update" >Update</button><a href="shoppingView.php" class="button">Checkout</a>';
	echo '</td>';
	echo '</tbody>';
	echo '</table>';
	
	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
	echo '</form>';
	echo '</div>';

}
?>
<!-- View Cart Box End -->


<!-- Products List Start -->
<?php
$results = $mysqli->query("SELECT service_code, service_name, service_desc, product_img_name, price FROM services ORDER BY product_img_name ASC");
if($results){ 
$products_item = '<ul class="products">';
//fetch results set as object and output HTML
while($obj = $results->fetch_object())
{
$products_item .= <<<EOT
	<li class="product">
	<form method="post" action="shoppingUpdate.php">
	<div class="product-content"><h3>{$obj->service_name}</h3>
	<div class="product-thumb"><img src="images/{$obj->product_img_name}"></div>
	<div class="product-desc">{$obj->service_desc}</div>
	<div class="product-info">
	Price {$currency}{$obj->price} 
	
		<fieldset>
	
	<label>
		<span>Quantity</span>
		<input type="text" size="2" maxlength="2" name="service_qty" value="1" />
	</label>
	
	</fieldset>
	
	<input type="hidden" name="service_code" value="{$obj->service_code}" />
	<input type="hidden" name="type" value="add" />
	<input type="hidden" name="return_url" value="{$current_url}" />
	<div align="center"><button type="submit" class="add_to_cart">Add</button></div>
	</div></div>
	</form>
	</li>
EOT;
}
$products_item .= '</ul>';
echo $products_item;
}
?>  	 
	</div>
	  
</body>
</html>
