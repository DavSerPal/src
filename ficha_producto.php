<?php include("templates/header.php"); ?>

<div class="container">

    <?php 
    foreach ($productos as $producto) {
        if ($producto['id'] == $id_producto){
    ?>

    <h2><?php print($producto['titulo'])?></h2>
    <h4><a href="#"><?php print(date("Y",$producto['fecha']))?></a></h4>
    <span>Categorías:  </span>
    <a href="#"><button class="btn btn-sm btn-default">
        <?php 
            foreach ($producto['categorias'] as $categoria => $nombre_categoria) {
                if ( array_key_exists($nombre_categoria, $categorias)):
                    print($categorias[$nombre_categoria] . " ");
                endif;
            }
        ?></button></a>
    <br> <br>
    <div class="row">
        <div class="col-sm">
            <img src="<?php print($producto['imagen'])?>" class="img-fluid rounded" width="400" height="400">
        </div>
        <div class="col-sm"><?php print(nl2br($producto['descripcion']))?></div>
    </div>
    <?php }} ?>
</div>

<?php include("templates/footer.php"); ?>