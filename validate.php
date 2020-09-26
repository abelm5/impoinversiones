<?php
include('db.php');
if(isset($_POST['subir']));
$categoria = $_REQUEST["categoria"];
$etiqueta = $_REQUEST["etiqueta"];
$precio = $_REQUEST["precio"];
$descripcion = $_REQUEST["descripcion"];
$file = $_FILES["files"]["name"];
$ruta = $_FILES["files"]["tmp_name"];
$destino = "files/".$file;
copy($ruta, $destino);

$query = "INSERT INTO files (categoria, files, etiqueta, precio, descripcion) VALUES ('$categoria', '$destino', '$etiqueta', '$precio', '$descripcion')";
$resultados = mysqli_query($conn, $query);
if (!$resultados) {
    die("Error Al Subir");
}

header("Location: upload.php");
?>