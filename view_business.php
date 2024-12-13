<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bussiness List</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Base Styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        h1,
        h2 {
            margin: 0;
            color: #004aad;
        }

        /* Navigation Bar */
        nav {
            background: #004aad;
            color: white;
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 10;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        nav a {
            margin: 0 15px;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            color: white;
        }

        nav a:hover {
            color: #ffdd57;
            text-decoration: underline;
            transition: color 0.3s ease;
        }

        /* Main Container */
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            position: relative;
        }

        /* Grid for Tourism Cards */
        .tourism-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        /* Individual Card */
        .tourism-card {
            background: #004aad;
            color: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .tourism-card h2 {
            margin-top: 0;
            font-size: 18px;
        }

        .tourism-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            z-index: 2;
        }

        .tourism-image {
            width: 100%;
            height: 200px;
            /* Adjust the height as per your preference */
            object-fit: cover;
            /* Ensures the image covers the space without distortion */
            border-radius: 10px;
            margin-bottom: 15px;
            /* Adds space between image and text */
        }


        /* Footer */
        footer {
            background: #333;
            color: #f4f4f9;
            text-align: center;
            padding: 15px 0;
            margin-top: 30px;
        }

        footer p {
            margin: 0;
            font-size: 14px;
        }
    </style>
</head>

<body>


    <!-- Main Content -->
    <div class="container">
        <h1>Registered Businesses</h1>
        <div class="tourism-list">
            <?php
            // Include the database connection
            include('db_connect.php');

            // Your SQL query and code
            $sql = "SELECT * FROM tbl_business WHERE status = 'Active'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='tourism-card'>";
                    echo "<h2>" . htmlspecialchars($row['name']) . "</h2>";
                    echo "<p>Type: " . htmlspecialchars($row['type']) . "</p>";
                    echo "<p>Location: " . htmlspecialchars($row['location']) . "</p>";
                    echo "<p>Description: " . htmlspecialchars($row['description']) . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No business data available.</p>";
            }

            // Close the connection
            $conn->close();
            ?>

        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Business Directory. All Rights Reserved.</p>
    </footer>
</body>

</html>