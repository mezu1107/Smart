
<?php
$servername = "localhost"; // your server
$username = "root"; // your database username
$password = ""; // your database password (empty by default on XAMPP)
$dbname = "smart_city"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
