<?php
// Include your database connection file
include_once('koneksi.php');

// Check if the ticket ID is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Your database delete code
    $sql = "DELETE FROM tikett WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Tiket deleted successfully!');
                window.location.href = 'dashboard.php';
              </script>";
    } else {
        echo "Error deleting ticket: " . $conn->error;
    }
} else {
    echo "Ticket ID not provided";
}
?>
