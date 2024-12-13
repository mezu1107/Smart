<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Student Facilities</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            line-height: 1.6;
        }

        /* Container */
        .container {
            width: 85%;
            margin: 40px auto;
        }

        /* Header Styling */
        h1 {
            text-align: center;
            color: #002244;
            font-size: 2.5rem;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Facility List Styling */
        .facility-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        /* Facility Card Styling */
        .facility-card {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            z-index: 1;
        }

        .facility-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 18px rgba(0, 0, 0, 0.2);
            z-index: 10;
        }

        /* Facility Card Header */
        .facility-card h2 {
            font-size: 1.5rem;
            color: #002244;
            margin-bottom: 10px;
            border-bottom: 2px solid #FFD700;
            padding-bottom: 5px;
        }

        /* Facility Card Text */
        .facility-card p {
            margin: 10px 0;
            font-size: 0.95rem;
            color: #555;
        }

        .facility-card p strong {
            color: #333;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .facility-card {
                width: 100%;
                margin-bottom: 20px;
            }
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Available Student Facilities</h1>
        <div class="facility-list">
            <?php
            include('db_connect.php');

            // Fetch active facilities from the database
            $sql = "SELECT * FROM tbl_student_facilities WHERE status = 'Active'";
            $result = $conn->query($sql);

            // Display facilities dynamically
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='facility-card'>";
                    echo "<h2>" . htmlspecialchars($row['name']) . "</h2>";
                    echo "<p><strong>Type:</strong> " . htmlspecialchars($row['type']) . "</p>";
                    echo "<p><strong>Location:</strong> " . htmlspecialchars($row['location']) . "</p>";
                    echo "<p><strong>Description:</strong> " . htmlspecialchars($row['description']) . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No student facilities available.</p>";
            }

            // Close the database connection
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
