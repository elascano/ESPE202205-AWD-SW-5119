<?php
include("db_connection.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM books WHERE id = $id";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die("Couldn't delete'");
    }
    $_SESSION['message'] = 'tare eliminada';
    $_SESSION['message_type'] = 'danger';
    header("Location:index.php");
}
?>