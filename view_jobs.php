<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Jobs</title>
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

        /* Job List Styling */
        .job-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        /* Job Card Styling */
        .job-card {
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

        .job-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 18px rgba(0, 0, 0, 0.2);
            z-index: 10;
        }

        /* Job Card Header */
        .job-card h2 {
            font-size: 1.5rem;
            color: #002244;
            margin-bottom: 10px;
            border-bottom: 2px solid #FFD700;
            padding-bottom: 5px;
        }

        /* Job Card Text */
        .job-card p {
            margin: 10px 0;
            font-size: 0.95rem;
            color: #555;
        }

        .job-card p strong {
            color: #333;
        }

        /* Apply Button */
        .job-card .apply-btn {
            display: inline-block;
            margin-top: 15px;
            padding: 12px 20px;
            background-color: #FFD700;
            color: #002244;
            text-decoration: none;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .job-card .apply-btn:hover {
            background-color: #002244;
            color: #FFD700;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .job-card {
                width: 100%;
                margin-bottom: 20px;
            }
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Available Jobs</h1>
        <div class="job-list">
            <?php
            include('db_connect.php');

            // Fetch open jobs from the database
            $sql = "SELECT * FROM tbl_jobs WHERE status = 'Open'";
            $result = $conn->query($sql);

            // Display jobs dynamically
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='job-card'>";
                    echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
                    echo "<p><strong>Department:</strong> " . htmlspecialchars($row['department']) . "</p>";
                    echo "<p><strong>Location:</strong> " . htmlspecialchars($row['location']) . "</p>";
                    echo "<p><strong>Description:</strong> " . htmlspecialchars($row['description']) . "</p>";
                    echo "<p><strong>Salary:</strong> $" . htmlspecialchars($row['salary']) . "</p>";
                    echo "<a href='#' class='apply-btn'>Apply Now</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>No job opportunities available.</p>";
            }

            // Close the database connection
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
