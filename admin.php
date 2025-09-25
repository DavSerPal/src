
<!-- DAVID SERRANO PALAZÓN -->

<?php include("templates/header.php"); ?>
<?php include_once("datos.php") ?>


<!-- <div class="row">
<div class="col-12 d-flex justify-content-center my-5">
    <a href="?page=<?php print($page+1) ?>" class="btn btn-primary btn-lg px-5 py-5">Siguiente</a>
</div>
</div> -->

<div class="container">
    <h2 class="mb-5">ADMINISTRADOR</h2>
    <div class="row">
        <div class="col-md">
            <img src="static/images/producto7.png" class="img-fluid rounded">
        </div>
        <div class="col-md">
            <h3><?php print($datos_contacto)?></h3>
            <p>Ciclo Superior DAW.</p>
            <p>Apasionado del mundo de la programación en general, y de las tecnologías web en particular.</p>
            <p>Si tienes cualquier tipo de pregunta, contacta conmigo por favor.</p>
            <p>Teléfono: 87654321</p>
        </div>
    </div>
</div>

<?php include("templates/footer.php"); ?>