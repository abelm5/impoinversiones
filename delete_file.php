<?php
include('db.php');

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $query = "DELETE FROM files WHERE id = $id";
    $results = mysqli_query($conn, $query);
    if (!$results) {
        die ("Error al eliminar");
    }

    header("Location: index.php");
}
?>