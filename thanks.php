<!DOCTYPE html>
<html> 
  
<head> 
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/thanks.css">
    <title>Thanks</title>
<header> 
	</header> 
</head> 
  
  
<?php 
   // Start the session 
    session_start();
    include('databaseConnection.php');
  
 // Retrieve the customer name from the session variable 
    if (isset($_SESSION['user'])) { 
        $user = $_SESSION['user']; 
        $name = $user['name']; 
    } else { 
        $name = "Valued Customer"; 
    } 
  
 // Display the thank you message 
    echo "<h1>Thank You, $name!</h1>"; 
    echo 
"<p>Your order has been received and will be delivered soon.</p>"; 
header("refresh:5;url=shop.html");
    ?> 
</html>