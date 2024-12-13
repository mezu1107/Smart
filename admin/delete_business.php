<?php
include('../db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM tbl_business WHERE business_id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Business entry deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<form method="POST">
    <label>ID:</label> <input type="text" name="id" required><br>
    <button type="submit">Delete Business</button>
</form>
