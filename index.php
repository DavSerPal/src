<!-- DAVID SERRANO PALAZÓN -->

<?php include_once("templates/header.php") ?>
<?php include_once("datos.php") ?>

<style>
  .div_boton{
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 100px;
  }
    button{
    width: 500px;
    height: 150px;
    align: center;
    border-radius: 20px;
    background: #2b2b2b;
  }
</style>
<div class="body-index">


  <div class="div_boton">
    <button><a href="productos.php">Ver Productos</a></button>
  </div>
</div>

<?php include_once("templates/footer.php") ?>