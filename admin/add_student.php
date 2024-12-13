<?php
include('../db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $location = $_POST['location'];
    $description = $_POST['description'];

    $sql = "INSERT INTO tbl_student_facilities (name, type, location, description, status) 
            VALUES ('$name', '$type', '$location', '$description', 'Active')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<div class='success-message'>New student facility added successfully!</div>";
    } else {
        echo "<div class='error-message'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Add Facility</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1;
            position: relative;
        }

        .container h1 {
            text-align: center;
            color: #0044cc;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        button {
            display: block;
            width: 100%;
            background-color: #0044cc;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #002a80;
        }

        .success-message {
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .error-message {
            padding: 10px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .info-box {
            background-color: #e7f3ff;
            color: #084298;
            border: 1px solid #b6d4fe;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .container {
                margin: 20px;
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Academic Information</h1>
        <div class="info-box">
            This module helps students move around the city. It provides students with all academic information, such as the locations of outstanding educational institutes, libraries, coaching centers, colleges, universities, and so on.
        </div>
        <form method="POST">
            <label for="name">Institution Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter institution name" required>

            <label for="type">Type:</label>
            <input type="text" id="type" name="type" placeholder="e.g., Library, Coaching Center, College" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" placeholder="Enter location address" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" placeholder="Provide a brief description" required></textarea>

            <button type="submit">Add Academic Information</button>
        </form>
    </div>
</body>
</html>
