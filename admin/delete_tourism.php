<?php
include('db_connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Use a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM tbl_tourism WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirect back to the admin panel with a success message
        header("message=Tourism entry deleted successfully");
       
    } else {
        // Handle error
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "No ID specified.";
}

$conn->close();
?>
