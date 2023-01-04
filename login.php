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
echo "";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #333;
      color: #fff;
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
    }

    input[type="text"],
    input[type="password"] {
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
      transition: all 0.2s ease-in-out;
    }

    input[type="submit"]:hover {
      background-color: #0052cc;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      transform: translateY(-2px);
    }
  </style>
</head>
<body>
  <form action="login.php" method="post">
    <h1>Login</h1>
    <input type ="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Submit">
  </form>
</body>
</html>