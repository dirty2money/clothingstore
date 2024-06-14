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
    <link rel="stylesheet" href="css/cart.css">
    <title>FLOWR cart</title>   
</head> 

<body> 
	<header> 

	</header> 

	<nav> 
    <a href="shop.html">SHOP</a>
    <a href="logout.php">LOGOUT</a>
	</nav> 

	<main> 
		<section> 
			<table> 
				<tr> 
					<th>Product Name </th> 
					<th>Quantity </th> 
					<th>Price </th> 
					<th>Total </th>
					<th>Action</th> 
				</tr> 
				<?php 
				$servername = "localhost"; 
				$username = "root"; 
				$password = ""; 
				$dbname = "flowr"; 

				// Create connection 
				$conn = 
					new mysqli($servername, $username, $password, $dbname); 

				// Check connection 
				if ($conn->connect_error) { 
					die("Connection failed: " . $conn->connect_error); 
				} 

				$total = 0; 

				// Loop through items in cart and display in table 
				foreach ($_SESSION['cart'] as $product_id => $quantity) { 
					$sql = "SELECT * FROM products WHERE id = $product_id"; 
					$result = $conn->query($sql); 

					if ($result->num_rows > 0) { 
						$row = $result->fetch_assoc(); 
						$name = $row['name']; 
						$price = $row['price']; 
						$item_total = $quantity * $price; 
						$total += $item_total; 

						echo "<tr>"; 
						echo "<td>$name</td>"; 
						echo "<td>$quantity</td>"; 
						echo "<td>R$price </td>"; 
						echo "<td>R$item_total </td>"; 
						echo "<td><form method='post' action='removeFromCart.php'>
								  <input type='hidden' name='product_id' value='$product_id'/>
								  <input type='submit' value='Remove' class='button'/>
							  </form></td>";
						echo "</tr>"; 
					} 
				} 
				// Display total 
				echo "<tr>"; 
				echo "<td colspan='3'>Total:</td>"; 
				echo "<td>R$total</td>"; 
				echo "<td></td>"; 
				echo "</tr>"; 
				?> 
			</table> 
			<form action="checkout.php" method="post"> 
				<input type="submit"
					value="Checkout"
					class="button" /> 
			</form> 
		</section> 
	</main> 

	<footer> 
		<p>&COPY;FLOWR 2024. ALL RIGHTS RESERVED.</p> 
	</footer> 
</body> 

</html>
