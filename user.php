<?php
// Database connection details
$host = 'localhost'; // Database host
$username = 'root';  // Database username
$password = '';      // Database password
$database = 'user_management'; // Your database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Correct SQL query to fetch data from the correct table
$sql = "SELECT id, name, email, phone FROM users"; // Adjust column names if necessary
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-bottom: 20px;
        }
        h1 {
            margin: 0;
            font-size: 2em;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .no-data {
            text-align: center;
            font-size: 1.2em;
            color: #555;
            padding: 20px;
        }
        footer {
            text-align: center;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>

<header>
    <h1>Users List</h1>
</header>

<div class="container">
    <?php
    // Check if there are results
    if ($result->num_rows > 0) {
        // Start the table
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th></tr>";

        // Output data for each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["phone"] . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<div class='no-data'>No users found.</div>";
    }

    // Close the connection
    $conn->close();
    ?>
</div>

<footer>
    <p>&copy; 2024 Your Website Name</p>
</footer>

</body>
</html>
