<?php
include('../db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $department = $_POST['department'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO tbl_jobs (title, department, location, description, salary, status) 
            VALUES ('$title', '$department', '$location', '$description', '$salary', 'Open')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<p class='success-msg'>New job opportunity added successfully!</p>";
    } else {
        echo "<p class='error-msg'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Add Job</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #004aad, #0073e6);
            color: #333;
            overflow-x: hidden;
        }

        nav {
            background-color: #004aad;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            position: sticky;
            top: 0;
        }

        nav .logo {
            font-size: 18px;
            font-weight: bold;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #ffdd57;
        }

        .container {
            background: #ffffff;
            margin: 50px auto;
            padding: 30px;
            max-width: 700px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            z-index: 900;
            position: relative;
        }

        h1 {
            color: #004aad;
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            display: block;
            font-weight: bold;
            margin: 10px 0 5px;
        }

        input[type="text"], textarea, input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input:focus, textarea:focus {
            border-color: #004aad;
            box-shadow: 0 0 8px rgba(0, 74, 173, 0.5);
            outline: none;
        }

        button {
            background-color: #004aad;
            color: white;
            font-size: 16px;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #00337a;
            transform: translateY(-2px);
        }

        .success-msg, .error-msg {
            text-align: center;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            font-weight: bold;
        }

        .success-msg {
            background-color: #28a745;
            color: #ffffff;
        }

        .error-msg {
            background-color: #dc3545;
            color: #ffffff;
        }

        footer {
            text-align: center;
            padding: 15px;
            background-color: #004aad;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .container {
            animation: fadeIn 0.8s ease-in-out;
        }

        button {
            animation: fadeIn 1s ease-in-out;
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo">Admin Panel</div>
        <div>
            <a href="#">Dashboard</a>
            <a href="#">Add Job</a>
            <a href="#">Manage Jobs</a>
            <a href="#">Logout</a>
        </div>
    </nav>

    <div class="container">
        <h1>Add Job Opportunity</h1>
        <form method="POST">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>

            <label for="department">Department:</label>
            <input type="text" name="department" id="department" required>

            <label for="location">Location:</label>
            <input type="text" name="location" id="location" required>

            <label for="description">Description:</label>
            <textarea name="description" id="description" rows="5" required></textarea>

            <label for="salary">Salary:</label>
            <input type="number" name="salary" id="salary" required>

            <button type="submit">Add Job</button>
        </form>
    </div>

    <footer>
        &copy; 2024 Admin Panel. All Rights Reserved.
    </footer>
</body>
</html>
