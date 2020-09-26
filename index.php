<?php
session_start();

$userRoot = FALSE;

if (!empty($_SESSION)) {
    $userRoot = TRUE;
}else {
    $userRoot = FALSE;
}
?>

<?php include('db.php')?>
<?php include('includes/header.php')?>

<div class="C-panel">
    <a class="sign-in" href="login.php"><i class="fas fa-sign-in-alt"></i></a>
                    <?php
                    if($userRoot == TRUE) {
                        echo '<a class="upload show" href="upload.php">
                              <i class="fas fa-upload"></i>
                              </a>';
                    }else {
                        echo '<a class="upload" href="upload.php">
                              <i class="fas fa-upload"></i>
                              </a>';
                    } ?>
                    <?php
                    if($userRoot == TRUE) {
                        echo '<a class="sign-out show" href="logout.php">
                              <i class="fas fa-sign-out-alt"></i>
                              </a>';
                    }else {
                        echo '<a class="sign-out" href="logout.php">
                              <i class="fas fa-sign-out-alt"></i>
                              </a>';
                    } ?>
</div>

    <div class="contenedor">
    <header>          
        <form action="index.php">
                <input type="text" class="barra-busqueda" name="barra-busqueda" id="barra-busqueda" placeholder="Buscar">
                <input type="submit" class="buscar" name="buscar" value="Buscar">
            </form>
            <div class="categorias" id="categorias">
                <a href="#" class="activo">Todos</a>
                <a href="#">Electricidad</a>
                <a href="#">Construcción</a>
                <a href="#">Plomeria</a>
                <a href="#">Herramientas</a>
            </div>
        </header>
        <section class="grid" id="grid">
            <?php       
            $etiqueta = "";
            $comienzo = 0;
            $limite = 15;
            if(isset($_GET['buscar'])) {
                $etiqueta = $_GET["barra-busqueda"];
                $limite = 200;
                $comienzo = 0;
            }else {
                $etiqueta = "";
            }
            if (isset($_GET['buscar']) && empty($_GET['barra-busqueda'])) {
                header("Location: index.php");
            }
            $query = "SELECT * FROM files WHERE etiqueta LIKE '%$etiqueta%' ORDER BY id DESC LIMIT $comienzo, $limite";
            $results_files = mysqli_query($conn, $query);
            
            while($res = mysqli_fetch_array($results_files)) { ?>  
            <div class="item"
                data-categoria="<?php echo $res["categoria"];?>" 
                data-etiqueta="<?php echo $res["etiqueta"];?>" 
                data-descripcion="<?php echo $res["descripcion"];?>"
                data-precio="<?php echo $res["precio"];?>">
                      
                <div class="item-contenido">
                    <img  src="<?php echo $res["files"]?>">
                    <p class="precio"><?php echo $res["precio"]?></p>
                    <div class="div-name">
                        <p class="nombre"><?php echo $res["descripcion"]?></p>
                    </div>
                    <div <?php
                    if($userRoot == TRUE) {
                        echo 'id="btn-detalles-push" class="btn-detalles-push"';
                    }else {
                       echo 'id="btn-detalles-push show" class="btn-detalles-push show"';
                    } ?>>

                        <i class="fas fa-ellipsis-h"></i>
                         <a href="delete_file.php?id=<?php 
                        if ($userRoot == TRUE) {
                            echo $res['id'];
                        }else{
                            echo "loggin";
                        }
                        ?>"><i class="fas fa-trash-alt"></i></a>
                    </div> 
                </div>
            </div>
            <?php }?> 
        </section>

        <section id="overlay" class="overlay">
            <div class="contenedor-img">
                <img class="img" src="<?php $res["files"]?>" width="300" heigth="300">
                <button class="btn" id="btn"><img src="icons/quit.png"></button>
            </div>
            <p class="descripcion"><?php echo $res["descripcion"]?></p>
        </section>
        
        <?php include('includes/socials-networks.php')?>