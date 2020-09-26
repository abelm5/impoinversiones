<?php
session_start();
if (empty($_SESSION)) {
    header('Location: login.php');
}

?>
<?php include('includes/header.php'); ?>
    <div class="contenedor">
            <section class="formulario">
                <div class="forms">
                    <form action="validate.php" method="POST" enctype="multipart/form-data">
                </div>
                    <div class="cont">
                        <input type="text" class="categoria" name="categoria" placeholder="añade una categoria" required>
                    </div>
                    <div class="cont">
                        <input type="text" class="etiqueta" name="etiqueta" placeholder="añade una etiqueta" required>
                    </div>
                    <div class="cont">
                        <input type="text" class="precio" name="precio" placeholder="precio">
                    </div>
                    <div class="cont">
                        <input type="text" name="descripcion" placeholder="nombre del producto" required>
                    </div>    
                    <div class="cont">
                        <input type="submit"  class="subir" name="enviar" value="Enviar">
                    </div>
                    <div class="cont-files">
                        <input type="file" class="archivo" name="files" id="files" required>    
                    </div>
                </form>
            </section>
    </div>
    <script src="includes/buttons.js"></script>
</body>
</html>