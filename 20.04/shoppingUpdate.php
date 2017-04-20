<?php
session_start();
include_once("config.php");
include_once("db.php");

//add service to session or create new one
if(isset($_POST["type"]) && $_POST["type"]=='add' && $_POST["service_qty"]>0)
{
	foreach($_POST as $key => $value){ //add all post vars to new_service array
		$new_service[$key] = filter_var($value, FILTER_SANITIZE_STRING);
    }
	//remove unecessary vars
	unset($new_service['type']);
	unset($new_service['return_url']); 
	
 	//we need to get service name and price from database.
    $statement = $mysqli->prepare("SELECT service_name, price FROM services WHERE service_code=? LIMIT 1");
    $statement->bind_param('s', $new_service['service_code']);
    $statement->execute();
    $statement->bind_result($service_name, $price);
	
	while($statement->fetch()){
		
		//fetch service name, price from db and add to new_service array
        $new_service["service_name"] = $service_name; 
        $new_service["service_price"] = $price;
        
        if(isset($_SESSION["cart_products"])){  //if session var already exist
            if(isset($_SESSION["cart_products"][$new_service['service_code']])) //check item exist in products array
            {
                unset($_SESSION["cart_products"][$new_service['service_code']]); //unset old array item
            }           
        }
        $_SESSION["cart_products"][$new_service['service_code']] = $new_service; //update or create product session with new item  
    } 
}


//update or remove items 
if(isset($_POST["service_qty"]) || isset($_POST["remove_code"]))
{
	//update item quantity in product session
	if(isset($_POST["service_qty"]) && is_array($_POST["service_qty"])){
		foreach($_POST["service_qty"] as $key => $value){
			if(is_numeric($value)){
				$_SESSION["cart_products"][$key]["service_qty"] = $value;
			}
		}
	}
	//remove an item from product session
	if(isset($_POST["remove_code"]) && is_array($_POST["remove_code"])){
		foreach($_POST["remove_code"] as $key){
			unset($_SESSION["cart_products"][$key]);
		}	
	}
}

//back to return url
$return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):''; //return url
header('Location:'.$return_url);

?>