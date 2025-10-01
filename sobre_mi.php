
<!-- DAVID SERRANO PALAZÓN -->

<?php include("templates/header.php"); ?>
<?php include_once("datos.php") ?>

<div class="container">
    <h2 class="mb-5">Sobre mí</h2>
    <div class="row">
        <div class="col-md">
            <img src="static/images/cilantro.png" class="img-fluid rounded" width="400" height="400">
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