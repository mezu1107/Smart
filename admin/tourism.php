<?php
// Database connection
$host = 'localhost';
$dbname = 'user_management';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $category = $_POST['category'];
        $description = $_POST['description'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip_code = $_POST['zip_code'];
        $phone_number = $_POST['phone_number'];
        $website_url = $_POST['website_url'];
        $rating = $_POST['rating'];

        // Insert data into the Tourism table
        $query = "INSERT INTO Tourism (name, category, description, address, city, state, zip_code, phone_number, website_url, rating)
                  VALUES (:name, :category, :description, :address, :city, :state, :zip_code, :phone_number, :website_url, :rating)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':name' => $name,
            ':category' => $category,
            ':description' => $description,
            ':address' => $address,
            ':city' => $city,
            ':state' => $state,
            ':zip_code' => $zip_code,
            ':phone_number' => $phone_number,
            ':website_url' => $website_url,
            ':rating' => $rating,
        ]);
    }

    // Query to fetch data
    $query = "SELECT * FROM Tourism";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error connecting to database: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tourism Directory</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .container { width: 90%; margin: auto; padding: 20px; }
        .form-container { margin-bottom: 20px; padding: 15px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9; }
        .form-container h2 { margin: 0 0 10px; }
        .form-container label { display: block; margin: 10px 0 5px; }
        .form-container input, .form-container textarea, .form-container select {
            width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 5px;
        }
        .form-container button { padding: 10px 20px; background-color: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .form-container button:hover { background-color: #0056b3; }
        .card { border: 1px solid #ddd; margin: 10px 0; padding: 15px; border-radius: 5px; }
        .card h2 { margin: 0; font-size: 1.5em; }
        .card p { margin: 5px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Tourism Directory</h1>

        <!-- Form to Add New Tourism Data -->
        <div class="form-container">
            <h2>Add New Entry</h2>
            <form method="POST" action="">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="category">Category:</label>
                <select id="category" name="category" required>
                    <option value="Hotel">Hotel</option>
                    <option value="Restaurant">Restaurant</option>
                    <option value="Attraction">Attraction</option>
                    <option value="ATM">ATM</option>
                    <option value="Theatre">Theatre</option>
                </select>

                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" required></textarea>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>

                <label for="city">City:</label>
                <input type="text" id="city" name="city" required>

                <label for="state">State:</label>
                <input type="text" id="state" name="state" required>

                <label for="zip_code">Zip Code:</label>
                <input type="text" id="zip_code" name="zip_code" required>

                <label for="phone_number">Phone Number:</label>
                <input type="text" id="phone_number" name="phone_number" required>

                <label for="website_url">Website URL:</label>
                <input type="url" id="website_url" name="website_url">

                <label for="rating">Rating (1-5):</label>
                <input type="number" id="rating" name="rating" step="0.1" min="1" max="5" required>

                <button type="submit">Add Entry</button>
            </form>
        </div>

        <!-- Display Tourism Data -->
        <?php if ($results): ?>
            <?php foreach ($results as $row): ?>
                <div class="card">
                    <h2><?= htmlspecialchars($row['name']) ?></h2>
                    <p><strong>Category:</strong> <?= htmlspecialchars($row['category']) ?></p>
                    <p><strong>Description:</strong> <?= htmlspecialchars($row['description']) ?></p>
                    <p><strong>Address:</strong> <?= htmlspecialchars($row['address']) ?></p>
                    <p><strong>City:</strong> <?= htmlspecialchars($row['city']) ?>, <?= htmlspecialchars($row['state']) ?>, <?= htmlspecialchars($row['zip_code']) ?></p>
                    <p><strong>Phone:</strong> <?= htmlspecialchars($row['phone_number']) ?></p>
                    <p><strong>Website:</strong> <a href="<?= htmlspecialchars($row['website_url']) ?>" target="_blank"><?= htmlspecialchars($row['website_url']) ?></a></p>
                    <p><strong>Rating:</strong> <?= htmlspecialchars($row['rating']) ?>/5</p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No data found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
