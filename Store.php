<?php
session_start();

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bazadedateproduse";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the products table
$sql = "SELECT id, name, price FROM products";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
  <title>Product Shop</title>
</head>
<body>
<div class="navbar">
<a class="btn" href="about-us.html">About Us</a>
<a class="btn" href="store.php">Store</a>
<a class="btn" href="login.php">Login</a>
<a class="btn" href="register.php">Register</a>
</div>
  <div class="product-list">

<?php
 if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
         echo "<div class='product-card'>";
       echo "<img src='Product" . $row["id"] .".jpg' alt='" . $row["name"] . "' class='product-img'>";
echo "<div class='product-info'>";
echo "<h2>" . $row["name"] . "</h2>";
echo "<p class='price'>$" . $row["price"] . "</p>";
echo "</div>";
echo "</div>";
}
} else {
echo "0 results";
}
$conn->close();
?>

</div>
</body>
</html>
