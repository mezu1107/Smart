<?php
include('../db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $location = $_POST['location'];
    $description = $_POST['description'];

    $sql = "UPDATE tbl_business 
            SET name='$name', type='$type', location='$location', description='$description' 
            WHERE business_id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Business entry updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<form method="POST">
    <label>ID:</label> <input type="text" name="id" required><br>
    <label>Name:</label> <input type="text" name="name"><br>
    <label>Type:</label> <input type="text" name="type"><br>
    <label>Location:</label> <input type="text" name="location"><br>
    <label>Description:</label> <textarea name="description"></textarea><br>
    <button type="submit">Update Business</button>
</form>
