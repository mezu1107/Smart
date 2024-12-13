<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <style>
        h1 {
            text-align: center;
            text-decoration: none;
            padding-top: 2rem;
        }

        .div {
            padding: 20px;
            margin: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            flex: 1 1 calc(33.33% - 40px);
            /* Adjust for 3 divs per row with margin */
            /* Ensures padding and margin are included in width */
        }

        .container {
            margin-top: 3rem;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
            /* Optional gap adjustment */
        }

        div:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        em {
            color: #999;
            font-style: italic;
        }

        img:hover {
            cursor: pointer;
        }

        img {
            width: 100%;
            height: auto;
            object-fit: cover;
            display: block;
        }

        /* Media queries for responsive design */
        @media screen and (max-width: 1024px) {
            div {
                flex: 1 1 calc(50% - 40px);
            }
        }

        @media screen and (max-width: 768px) {
            div {
                flex: 1 1 100%;
            }
        }

        /* Styling for the search bar */
        .search-bar {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
        }

        .search-bar {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        /* Styling for the search input field */
        .search-input {
            padding: 10px;
            font-size: 16px;
            border: 2px solid #ccc;
            border-radius: 4px;
            width: 250px;
        }

        /* Styling for the search button */
        .search-button {
            padding: 10px 20px;
            font-size: 16px;
            border: 2px solid #007BFF;
            background-color: #007BFF;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }
       
    </style>
    </style>
       <!-- Search Bar Section -->
   
       <div class="search-bar">
        <input type="text" class="search-input" placeholder="Search destinations...">
        <button class="search-button" onclick="alert('Search functionality will be implemented')">Search</button>
    </div>

    <h1>Welcome To Tourism</h1>
    <div class="container">

    

        <?php
        include('db_connect.php');

        $sql = "SELECT * FROM tbl_tourism WHERE status = 'Open'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div style='margin-bottom: 20px;'>";
                echo "<h2>" . htmlspecialchars($row['name']) . "</h2>";
                echo "<p>" . htmlspecialchars($row['description']) . "</p>";
                if (!empty($row['image_url'])) {
                    echo "<img src='" . htmlspecialchars($row['image_url']) . "' alt='" . htmlspecialchars($row['name']) . "' style='width: 300px; height: auto;'>";
                } else {
                    echo "<p><em>No image available</em></p>";
                }
                echo "</div>";
            }
        } else {
            echo "<p>No tourism data available.</p>";
        }
        ?>

    </div>
    
</body>

</html>