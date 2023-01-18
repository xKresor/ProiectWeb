<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bazadedateuser";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $error = "";  // Initialize error message to an empty string

    // Validate input
    if (strlen($username) < 6 || strlen($username) > 32) {
        $error = "Error: Invalid username length. Must be between 6 and 32 characters.";
    } elseif (strlen($password) < 6 || strlen($password) > 32) {
        $error = "Error: Invalid password length. Must be between 6 and 32 characters.";
    } elseif (strlen($email) < 6 || strlen($email) > 32) {
        $error = "Error: Invalid email length. Must be between 6 and 32 characters.";
    } else {
        // Insert new user into database
        $sql = "INSERT INTO users (username, password, email) VALUES ('" . $username . "', '" . $password . "', '" . $email . "')";
        if ($conn->query($sql) === TRUE) {
            $error = "Registration successful!";
        } else {
            $error = "Error: " . $conn->error;
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #333;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
form {
  width: 300px;
  background-color: #444;
  border-radius: 4px;
  box-shadow: 0 2px 4px rgba(0,0,0,0.2);
  padding: 20px;
  display: flex;
  flex-direction: column;
}

input[type="text"],
input[type="password"],
input[type="email"] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-radius: 4px;
  background-color: #fff;
  color: #333;
}

input[type="submit"] {
  width: 100%;
  background-color: #00b8d4;
  color: #fff;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  box-shadow: 0 2px 4px rgba(0,0,0,0.2);
  transition: all 0.2ease-in-out;
}

input[type="submit"]:hover {
  background-color: #0052cc;
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
  transform: translateY(-2px);
}
/* Add new styles for the navigation buttons */
.nav-btn {
  background-color: #00b8d4;
  color: #fff;
  padding: 14px 20px;
  margin: 8px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  box-shadow: 0 2px 4px rgba(0,0,0,0.2);
  transition: all 0.2s ease-in-out;
  display:inline-block; /* display the button inline */
}
.nav-btn:hover {
  background-color: #ff0000; /* change the color of the button when hovered over */
}
/* Add a container to hold the navigation buttons and position it at the top of the page */
#nav-container {
  position: absolute;
top: 0;
width: 100%;
text-align: center;
}
</style>

</head>
<body>
  <div id="nav-container">
    <button class="nav-btn" onclick="window.location.href='main.html'">Home</button>
    <button class="nav-btn" onclick="window.location.href='login.php'">Login</button>
    <button class="nav-btn" onclick="window.location.href='register.php'">Register</button>
    <button class="nav-btn" onclick="window.location.href='about-us.html'">About Us</button>
  </div>
  <form action="register.php" method="post">
    <h1>Register</h1>
    <input type="text" placeholder="Username" name="username"><br>
    <input type="password" placeholder="Password" name="password"><br>
    <input type="email" placeholder="Email" name="email"><br>
    <input type="submit" value="Submit">
    <br>
    <?php
      if (isset($error) && $error != "") {  // Check if there is an error message
          echo $error;  // If there is, display it
      }
    ?>
  </form>
</body>
</html>
