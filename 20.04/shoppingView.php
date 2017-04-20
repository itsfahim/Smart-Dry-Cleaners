<?php
session_start();
include_once("config.php");
include_once("db.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View basket</title>
<link href="css/multiColumnTemplate.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css"></head>
<body>
<header>
<div class="container">
<div class="primary_header">
      <h1 class="title">Smart Dry Cleaners</h1>
    </div></header>
	  </div>
	
	  <div class="underPageTitle">
<h1 align="center">View Cart</h1>
<?php echo "You are logged in as " . $_SESSION["username"] . ".<br>"; ?>
<div class="cart-view-table-back">
<form method="post" action="shoppingUpdate.php">
<table width="100%"  cellpadding="6" cellspacing="0"><thead><tr><th>Quantity</th><th>Name</th><th>Price</th><th>Total</th><th>Remove</th></tr></thead>
  <tbody>
 	<?php
	if(isset($_SESSION["cart_products"])) //check session var
    {
		$total = 0; //set initial total value
		$b = 0; //var for zebra stripe table 
		foreach ($_SESSION["cart_products"] as $cart_itm)
        {
			//set variables to use in content below
			$service_name = $cart_itm["service_name"];
			$service_qty = $cart_itm["service_qty"];
			$service_price = $cart_itm["service_price"];
			$service_code = $cart_itm["service_code"];
			$subtotal = ($service_price * $service_qty); //calculate Price x Qty
			
		   	$bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe 
		    echo '<tr class="'.$bg_color.'">';
			echo '<td><input type="text" size="2" maxlength="2" name="service_qty['.$service_code.']" value="'.$service_qty.'" /></td>';
			echo '<td>'.$service_name.'</td>';
			echo '<td>'.$currency.$service_price.'</td>';
			echo '<td>'.$currency.$subtotal.'</td>';
			echo '<td><input type="checkbox" name="remove_code[]" value="'.$service_code.'" /></td>';
            echo '</tr>';
			$total = ($total + $subtotal); //add subtotal to total var
			$grandtotal = ($total * 100);
        }
		
		
	}
    ?>
    <tr><td colspan="5"><span style="float:right;text-align: right;">Total : <?php echo $currency.($total);?></span></td></tr>
    <tr><td colspan="5"><a href="shoppingHomepage.php" class="button">Shop more</a></td></tr>
    <tr><td colspan="5"><button type="submit" class="update">Update</button></td></tr>
     </tbody>
</table>  

<input type="hidden" name="return_url" value="<?php 
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo $current_url; ?>" />
</form>

</div>
</div>
<div class="payment">
 <form action="paid.php" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_6pRNASCoBOKtIshFeQd4XMUh"
    data-amount="<?php echo ($grandtotal);?>"
    data-name="Stripe.com"
    data-description="Widget"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto"
    data-zip-code="true">
  </script>
	</form>
	
  </div>
</body>
</html>
