<?php
/*
* Eliminar un producto del carrito
*/
session_start();
if (!isset($_SESSION["login"])) {
	print "<script>window.location='../login.php';</script>";
} else {
if(!empty($_SESSION["cart"])){
	$cart  = $_SESSION["cart"];
	if(count($cart)==1){ unset($_SESSION["cart"]); }
	else{
		$newcart = array();
		foreach($cart as $c){
			if($c["product_id"]!=$_GET["id"]){
				$newcart[] = $c;
			}
		}
		$_SESSION["cart"] = $newcart;
	}
}
print "<script>window.location='../carrito.php';</script>";
}
