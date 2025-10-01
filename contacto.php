<!-- DAVID SERRANO PALAZÓN -->

<?php include("templates/header.php"); ?>
<?php include_once("datos.php") ?>


<?php
$nameErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nombreApellidos"])) {
        $nameErr = "Por favor, introduzca nombre y apellidos";
    } else {
        $name = test_input($_POST["nombreApellidos"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Solo se permiten letras y espacios.";
        }
    }
}
?>

<div class="container">
    <h2 class="mb-5">Contacta con Nosotros</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <div class="mb-3 col-sm-6 p-0">
            <label for="nombreApellidosID" class="form-label">Nombre y apellidos</label>
            <input type="text" name="nombreApellidos" class="form-control" id="nombreApellidosID" placeholder="Su nombre y apellidos">
        </div>
        <button type="submit" class="btn btn-success">Enviar</button>
    </form>

</div>

<?php include("templates/footer.php"); ?>