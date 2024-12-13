<?php
include('../db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $department = $_POST['department'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $salary = $_POST['salary'];

    $sql = "UPDATE tbl_jobs 
            SET title='$title', department='$department', location='$location', description='$description', salary='$salary' 
            WHERE job_id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Job entry updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<form method="POST">
    <label>ID:</label> <input type="text" name="id" required><br>
    <label>Title:</label> <input type="text" name="title"><br>
    <label>Department:</label> <input type="text" name="department"><br>
    <label>Location:</label> <input type="text" name="location"><br>
    <label>Description:</label> <textarea name="description"></textarea><br>
    <label>Salary:</label> <input type="number" name="salary"><br>
    <button type="submit">Update Job</button>
</form>
