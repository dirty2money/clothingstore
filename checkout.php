<?php 
session_start();
include('databaseConnection.php'); 
?>
<!DOCTYPE html> 
<html> 

<head> 
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/checkout.css">
	<title>FLOWR Checkout</title>  
</head> 

<body> 
	<header> 
		<nav> 
		<nav>
		<a href="shop.php">SHOP</a>
        <a href="cart.php">CART</a>
		<a href="logout.php">LOGOUT</a>
    </nav>
	</header> 

	<section> 
		<h1>Checkout</h1> 
		<form action="thanks.php" method="post"> 
			<h2>Billing Information</h2> 
			<label for="name">Name:</label> 
			<input type="text"
				id="name"
				name="name" required> 

			<label for="email">Email:</label> 
			<input type="email"
				id="email"
				name="email" required> 

			<label for="address">Address:</label> 
			<input type="text"
				id="address"
				name="address" required> 

			<label for="city">City:</label> 
			<input type="text"
				id="city"
				name="city" required> 

			<label for="state">Province:</label> 
			<input type="text"
				id="state"
				name="state" required> 

			<label for="zip">Zip Code:</label> 
			<input type="text"
				id="zip"
				name="zip" required> 

			<h2>Payment Information</h2> 
			<label for="cardholder">Name on Card:</label> 
			<input type="text" id="cardholder"
				name="cardholder" required> 

			<label for="cardnumber">Card Number:</label> 
			<input type="text"
				id="cardnumber"
				name="cardnumber" required 
				pattern="\d{4}-?\d{4}-?\d{4}-?\d{4}" required=> 


			<label for="expmonth">Expiration Month:</label> 
			<input type="text"
				id="expmonth"
				name="expmonth" required> 

			<label for="expyear">Expiration Year:</label> 
			<input type="text"
				id="expyear"
				name="expyear" required> 

			<label for="cvv">CVV:</label> 
			<input type="text"
				id="cvv"
				name="cvv" required> 

			<input type="submit"
				value="Place Order"> 
		</form> 
	</section> 

	<footer> 
		<p>&copy;FLOWR 2024. ALL RIGHTS RESERVED.</p> 
	</footer> 
</body> 

</html>
