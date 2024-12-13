<?php
include('../db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $location = $_POST['location'];
    $description = $_POST['description'];

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $image_url = $target_file;
        } else {
            echo "Error uploading the image.";
            $image_url = null;
        }
    } else {
        $image_url = null;
    }

    $sql = "INSERT INTO tbl_tourism (name, type, location, description, image_url, status) 
            VALUES ('$name', '$type', '$location', '$description', '$image_url', 'Open')";
    
   
}
?>
<form method="POST" enctype="multipart/form-data">
    <label>Name:</label> <input type="text" name="name" required><br>
    <label>Type:</label> <input type="text" name="type" required><br>
    <label>Location:</label> <input type="text" name="location" required><br>
    <label>Description:</label> <textarea name="description" required></textarea><br>
    <label>Image:</label> <input type="file" name="image" accept="image/*"><br>
    <button type="submit">Add Tourism</button>
</form>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"], textarea, input[type="file"], button {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        button {
            background-color:rgb(17, 0, 255);
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color:rgb(120, 138, 197);
        }

        @media (max-width: 768px) {
            form {
                padding: 15px;
                box-shadow: none;
            }

            input[type="text"], textarea, input[type="file"], button {
                padding: 12px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>



</body>
</html>
