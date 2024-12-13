<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "user_management";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission to add a new user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];

    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "New user added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle user deletion
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    $sql = "DELETE FROM users WHERE id = $delete_id";
    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}

// Handle user edit
if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];

        $sql = "UPDATE users SET name = '$name', email = '$email' WHERE id = $edit_id";
        if ($conn->query($sql) === TRUE) {
            echo "User updated successfully.";
        } else {
            echo "Error updating user: " . $conn->error;
        }
    } else {
        // Fetch user details for editing
        $sql = "SELECT * FROM users WHERE id = $edit_id";
        $result = $conn->query($sql);
        $user = $result->fetch_assoc();
    }
}

// Fetch all users
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
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

        th,
        td {
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

        form {
            margin: 20px 0;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="email"] {
            padding: 10px;
            margin: 5px;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .buttons {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .buttons:hover {
            background-color: #45a049;
        }

        .no-data {
            text-align: center;
            font-size: 1.2em;
            color: #555;
            padding: 20px;
        }
    </style>
</head>

<body>

    <header>
        <h1>User Management</h1>
    </header>

    <div class="container">
        <!-- Add User Form -->
        <h2>Add New User</h2>
        <form method="POST">
            <input type="text" name="name" placeholder="Enter name" required>
            <input type="email" name="email" placeholder="Enter email" required>
            <button type="submit" name="add" class="buttons">Add User</button>
        </form>

        <!-- Display Users -->
        <h2>Users List</h2>
        <?php
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>
                        <a href='?edit_id=" . $row["id"] . "' class='buttons'>Edit</a>
                        <a href='?delete_id=" . $row["id"] . "' class='buttons' style='background-color: #f44336;'>Delete</a>
                    </td>
                  </tr>";
            }
            echo "</table>";
        } else {
            echo "<div class='no-data'>No users found.</div>";
        }
        ?>

        <!-- Edit User Form (if editing) -->
        <?php if (isset($user)): ?>
            <h2>Edit User</h2>
            <form method="POST">
                <input type="text" name="name" value="<?php echo $user['name']; ?>" required>
                <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
                <button type="submit" name="update" class="buttons">Update User</button>
            </form>
        <?php endif; ?>
    </div>

</body>

</html>

<?php
$conn->close();
?>