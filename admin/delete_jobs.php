<?php
include('../db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM tbl_jobs WHERE job_id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Job entry deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<form method="POST">
    <label>ID:</label> <input type="text" name="id" required><br>
    <button type="submit">Delete Job</button>
</form>
