<?php 
session_start();

if (!empty($_SESSION)) {
    header('Location: index.php');
}

$rootuser = FALSE;
$contraseña = "";
$rootcontraseña = "000impoinversiones000";
if (!empty($_POST["contraseña"])) {
    $contraseña = $_POST["contraseña"];
}
if ($contraseña == $rootcontraseña) {
    $rootuser = TRUE;
}else {
    $rootuser = FALSE;
}
if ($rootuser == TRUE) {
    $_SESSION = $_POST;
    header('Location: index.php');

}else {
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | impoinversiones</title>
    <link rel="stylesheet" href="includes/styles.css">
</head>
<body class="body-loggin">
    <section class="forms-user">  
        <div class="formulario-user">
            <form action="login.php" method="POST">
            <input name="contraseña" type="text" placeholder="clave">
            <hr class="line">
            <div class="submit-btn-div">
                <input type="submit" name="submit-btn" value="Ingresar">
            </div>
            </form>
        </div>

    </section>
</body>
</html>

