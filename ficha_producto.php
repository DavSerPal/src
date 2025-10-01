<?php include("templates/header.php"); ?>
<?php include_once("datos.php") ?>


<!-- <div class="row">
<div class="col-12 d-flex justify-content-center my-5">
    <a href="?page=<?php print($page+1) ?>" class="btn btn-primary btn-lg px-5 py-5">Siguiente</a>
</div>
</div> -->

<div class="container">
    
    <?php
    foreach ($productos as $producto) {
            if ($producto['id'] == $id_producto) { 
    ?>
                
        <h2 class="mb-5"><?php print($producto['titulo'])?></h2>
        <div class="row">
            <div class="col-md">
                <img src="<?php print($producto['imagen'])?>" class="img-fluid rounded" width="400" height="400">
            </div>
            <div class="col-md">
                <h3><?php print($producto['titulo'])?></h3>
                <p><?php print($producto['descripcion'])?></p>  
                <p><?php print(nl2br($producto['fecha']))?></p>
                <p class="card-text">Categorias:
                    <?php 
                    foreach ($producto['categorias'] as $categoria => $nombre_categoria) {
                        if ( array_key_exists($nombre_categoria, $categorias)):
                            print($categorias[$nombre_categoria] . " ");
                        endif;
                    }
                    ?></p>
                <p><?php print($producto['precio'])?></p>
            </div>
        </div>
    <?php            
            }
        }
    ?>
</div>

<?php include("templates/footer.php"); ?>