<?php
$registration_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Create connection
    $conn = new mysqli('localhost', 'root', '', 'flowr');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO clients (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $first_name, $last_name, $email, $hashed_password);

        // Execute the statement
        if ($stmt->execute()) {
            $registration_message = "Registration Successful";
        } else {
            $registration_message = "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLOWR Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fffaeeff;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }
        .registration-message {
            margin-top: 20px;
            padding: 10px;
            color: #33333;
            border: none;
            width: 300px;
            text-align: center;
            display: <?php echo $registration_message ? 'block' : 'none'; ?>;
        }
        .login-container {
            width: 300px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .login-container div {
            margin-bottom: 15px;
        }
        .login-container label,
        .login-container p {
            margin-bottom: 5px;
            font-weight: bold;
        }
        .login-container input[type="email"],
        .login-container input[type="password"] {
            background-color: #FAF9F6;
            width: 100%;
            padding: 10px;
            border: 1px solid #333333;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .login-container button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #fffaeeff;
            color: #333333;
            border: solid 1px #333333;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .login-container button[type="submit"]:hover {
            background-color: #ffefcc;
            opacity: 0.9;
        }
        footer {
            color: #333333;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="registration-message">
        <?php echo $registration_message; ?>
    </div>
    <div class="login-container">
        <form action="connect.php" method="post" name="login-form">
            <div>
                <label>Email<span style="color:red">*</span></label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label>Password<span style="color:red">*</span></label>
                <input type="password" name="password" required>
            </div>
            <div>
                <button type="submit" name="login" value="login">LOGIN</button>
                <p>Don't have an account? <a href="flowrSignUp.html">Sign up here</a></p>
            </div>
        </form>
    </div>
    <footer>
        <p>&copy; FLOWR 2024. ALL RIGHTS RESERVED.</p>
    </footer>
</body>
</html>
