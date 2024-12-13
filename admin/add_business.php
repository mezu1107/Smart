<?php
// Assuming the form method is POST and enctype="multipart/form-data"
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $name = $_POST['name'];
    $type = $_POST['type'];
    $location = $_POST['location'];
    $description = $_POST['description'];

    // Image handling
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Set the image file path
        $imageName = $_FILES['image']['name'];
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageSize = $_FILES['image']['size'];
        $imageError = $_FILES['image']['error'];
        $imageType = $_FILES['image']['type'];

        // Define the target path for image upload
        $targetDir = "uploads/";
        $imagePath = $targetDir . basename($imageName);

        // Check if the file is an image
        $imageExt = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION));
        $allowedExts = array('jpg', 'jpeg', 'png', 'gif');

        if (in_array($imageExt, $allowedExts)) {
            if (move_uploaded_file($imageTmpName, $imagePath)) {
                // Assign the image path to the variable
                $image = $imagePath;
            } else {
                // Handle error in file upload
                echo "Error uploading the image.";
            }
        } else {
            echo "Invalid image format.";
        }
    } else {
        // If no image is uploaded, set a default or handle as needed
        $image = ""; // You could set a default value or handle differently
    }

    // Now insert the data into the database, ensuring the image variable is used
    include('db_connect.php');

    $sql = "INSERT INTO tbl_business (name, type, location, description, image) 
            VALUES ('$name', '$type', '$location', '$description', '$image')";

    if ($conn->query($sql) === TRUE) {
        echo "New business added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Add Business</title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        /* Base Styling */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #004aad;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        input:focus, textarea:focus {
            border-color: #004aad;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 74, 173, 0.5);
        }

        button {
            width: 100%;
            background: #004aad;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background: #00337a;
            transform: translateY(-2px);
        }

        .success-msg {
            color: #28a745;
            font-weight: bold;
            text-align: center;
        }

        .error-msg {
            color: #dc3545;
            font-weight: bold;
            text-align: center;
        }

        nav {
            background: #004aad;
            color: white;
            padding: 10px 20px;
            position: sticky;
            top: 0;
            z-index: 100;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        nav a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            margin-left: 15px;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #ffdd57;
        }

        footer {
            text-align: center;
            padding: 15px;
            background: #004aad;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <nav>
        <div>Admin Panel</div>
        <div>
            <a href="#">Dashboard</a>
            <a href="#">Add Business</a>
            <a href="#">Manage Entries</a>
            <a href="#">Logout</a>
        </div>
    </nav>

    <div class="container">
        <h1>Add New Business</h1>
        <form method="POST">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>

            <label for="type">Type:</label>
            <input type="text" name="type" id="type" required>

            <label for="location">Location:</label>
            <input type="text" name="location" id="location" required>

            <label for="description">Description:</label>
            <textarea name="description" id="description" rows="5" required></textarea>
            <label>Image:</label> <input type="file" name="image" accept="image/*"><br>

            <button type="submit">Add Business</button>
        </form>
    </div>

    <footer>
        &copy; 2024 Admin Panel. All Rights Reserved.
    </footer>
</body>
</html>
