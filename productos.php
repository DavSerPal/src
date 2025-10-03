
<!-- DAVID SERRANO PALAZÓN -->


<?php include_once("templates/header.php") ?>
<?php include_once("datos.php") ?>

<style>
  .card-img-top{
    width: 250px;
    height: 250px;
    align-self: center;
  }
  .div_botones{
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    margin-top: 20px;
    margin-bottom: 20px;
    color: #fff;
    background: #2b2b2b;
  }
  .div_ppp{
    display: flex;
    justify-content: left;
    align-items: center;
    margin-left: 70px;
  }
</style>

<?php
function ver_productos($page,$prod_por_pag){
  $prod_fin=$page*$prod_por_pag;
  $prod_inicio=$prod_fin-$prod_por_pag;

  return [$prod_inicio, $prod_fin];
}
?>

<!-- 
  Seleccion de distintos tipos de orden (if de los usort)
-->
<?php
if ($order == 0) {
  function titulo_desc($a, $b) {
    return strcmp($a['titulo'], $b['titulo']);
  }
  usort($productos, 'titulo_desc');
} elseif ($order == 1) {
  function titulo_asc($a, $b) {
    return strcmp($b['titulo'], $a['titulo']);
  }
  usort($productos, 'titulo_asc');
}
?>
<?php 
    $prod_filtrados = array_values(array_filter($productos, function($producto) use($fltro_categoria,$categorias){
      if ($fltro_categoria=="no-cat"){
        return true;
      } else {
        
        foreach ($producto['categorias'] as $value) {
          if ($categorias[$value] == $fltro_categoria) {
            return true;
          }
        }
        return false;
      }
    })); 

    if ($prod_filtrados) {
      $productos = $prod_filtrados;
    }
  ?>

<div class="d-flex mx-auto">
  <a class="btn btn-primary btn-lg px-5 py-2 mx-2" href="?page=<?php print($page) ?>&categoria=<?php print($fltro_categoria) ?>&order=0&prod_pag=<?php print($prod_por_pag)?>">Descendente (A-Z)</a>
  <a class="btn btn-primary btn-lg px-5 py-2 mx-2" href="?page=<?php print($page) ?>&categoria=<?php print($fltro_categoria) ?>&order=1&prod_pag=<?php print($prod_por_pag)?>">Ascendente (Z-A)</a>
  <a class="btn btn-primary btn-lg px-5 py-2 mx-2" href="productos.php?page=<?php print($page) ?>&categoria=no-cat&order=<?php print($order)?>&prod_pag=<?php print($prod_por_pag)?>">No filtrar por categoría</a>
</div>

  <div class="container mb-5">
    <div class="d-flex justify-content-center align-items-center">
      <?php
        if ($page > ceil(count($prod_filtrados)/$prod_por_pag)){
          print("<h1 style='padding-top: 150px; padding-bottom: 150px;'> NO EXISTEN PRODUCTOS O LA PÁGINA ES INCORRECTA</h1>");

          $no_productos = true;

        }
      ?>
    </div>
    <div class="row">

    <?php $prod_pag = ver_productos($page,$prod_por_pag);?>

    <?php for($i = $prod_pag[0];$i < $prod_pag[1]; $i++): ?>

      <?php if ($productos[$i]['id']) {?>

      <div class="col-sm-3">
          <a href="ficha_producto.php?id=<?php print($productos[$i]['id']) ?>" class="p-5 text-decoration-none">
            <div class="card">
                <img class="card-img-top" src=<?php $productos[$i]['imagen']?print($productos[$i]['imagen']):print("./static/images/default.png")  ?> alt="<?php print($productos[$i]['titulo'])?>" >
                <div class="card-body">
                    <h5 class="card-title"><?php print($productos[$i]['titulo']) ?></h5>
                    <p class="card-text"><?php print($productos[$i]['descripcion']) ?></p>
                    <p class="card-text"><?php print($productos[$i]['precio']) ?></p>
                    <p class="card-text">Categorias:
                    <?php 
                    foreach ($productos[$i]['categorias'] as $categoria => $nombre_categoria) {
                      if ( array_key_exists($nombre_categoria, $categorias)):
                        print($categorias[$nombre_categoria] . " ");
                      endif;
                    }
                    ?></p>
                </div>
            </div>
          </a>
        </div>
      <?php 
      }
      endfor; ?>
    </div>
  </div>
  <div class="div_ppp">
    <ul class="nav nav-pills">
      <li class="nav-item dropdown">    
        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenu1" data-bs-toggle="dropdown" aria-expanded="false">
            Productos por pagina
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
          <li><a class="dropdown-item" href="?page=<?php print($page) ?>&categoria=<?php print($fltro_categoria) ?>&order=<?php print($order)?>&prod_pag=4?>">4</a></li>
          <li><a class="dropdown-item" href="?page=<?php print($page) ?>&categoria=<?php print($fltro_categoria) ?>&order=<?php print($order)?>&prod_pag=8?>">8</a></li>
          <li><a class="dropdown-item" href="?page=<?php print($page) ?>&categoria=<?php print($fltro_categoria) ?>&order=<?php print($order)?>&prod_pag=12?>">12</a></li>
          <li><a class="dropdown-item" href="?page=<?php print($page) ?>&categoria=<?php print($fltro_categoria) ?>&order=<?php print($order)?>&prod_pag=16?>">16</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="div_botones d-flex">
    <a class="btn btn-primary btn-lg px-5 py-2" href="?page=<?php print($page-1) ?>&categoria=<?php print($fltro_categoria) ?>&order=<?php print($order) ?>&prod_pag=<?php print($prod_por_pag)?>" style="<?php if ($page==1 || $no_productos) print("display: none"); ?>">Atras</a>
    <a class="btn btn-primary btn-lg px-5 py-2 ms-auto" href="?page=<?php print($page+1) ?>&categoria=<?php print($fltro_categoria) ?>&order=<?php print($order) ?>&prod_pag=<?php print($prod_por_pag)?>" style="<?php if ($page==ceil(count($prod_filtrados)/$prod_por_pag) || $no_productos) {print("display: none");} ?>">Siguiente</a>
  </div>

<?php include_once("templates/footer.php") ?>