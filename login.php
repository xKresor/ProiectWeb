<?php
// Define the $error variable as an empty string
$error = "";

// Check if the form was submitted
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  // Get the username and password from the form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Connect to the database
  $servername = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbname = "bazadedateuser";

  $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Check if the user exists in the database
  $sql = "SELECT * FROM users WHERE username = '$username'";
  $result = $conn->query($sql);

  // If the user exists, verify their password
  if ($result->num_rows > 0) {
      $user = $result->fetch_assoc();
      if ($password == $user['password']) {
          // Password is correct, show a success message and start the countdown
          $error = "Login successfully. Redirecting to the store in <span id='countdown'>5</span> seconds...";
      } else {
          // Password is incorrect, show an error message
          $error = "Incorrect password. Please try again.";
      }
  } else {
      // User does not exist, show an error message
      $error = "User does not exist. Please sign up first.";
  }
}
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
  left: 0;
  width: 100%;
  text-align: center; /* center the buttons within the container */
}
  </style>
</head>
<body>
  <!-- Add the navigation buttons container -->
  <div id="nav-container">
    <button class="nav-btn" onclick="window.location.href='main.html'">Home</button>
    <button class="nav-btn" onclick="window.location.href='login.php'">Login</button>
    <button class="nav-btn" onclick="window.location.href='register.php'">Register</button>
<button class="nav-btn" onclick="window.location.href='about-us.html'">About Us</button>

  </div>
  <form action="login.php" method="post">
    <h1>Login</h1>
    <input type ="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Submit">
    <p id="error"><?php echo $error; ?></p>
  </form>
  <?php if ($error == "Login successfully. Redirecting to the store in <span id='countdown'>5</span> seconds..."): ?>
<script>
  let countdown = 5;
  setInterval(function() {
    // Decrement the countdown by 1
    countdown--;
    // Update the countdown in the HTML
    document.getElementById("countdown").innerHTML = countdown;
  }, 1000);

  setTimeout(function() {
    // Redirect the user to the store page
    window.location.href = "store.html";
  }, countdown *1000);
</script>
<?php endif; ?>
</body>
</html>
