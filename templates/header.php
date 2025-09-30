
<!-- DAVID SERRANO PALAZÓN -->

<html lang="es">
<head>
    <title>Portfolio de proyectos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    

    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- Optional theme -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/flatly/bootstrap.min.css" integrity="sha384-qF/QmIAj5ZaYFAeQcrQ6bfVMAh4zZlrGwTPY7T/M+iTTLJqJBJjwwnsE5Y0mV7QK" crossorigin="anonymous">     -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("datos.php") ?>
    <style>
        header{
            background: #eaeaea;
        }
        footer{
            background: #eaeaea;
        }
    </style>
</head>
<!-- https://radu.link/make-footer-stay-bottom-page-bootstrap/ -->
<body class="d-flex flex-column min-vh-100">

    <?php
    $page = isset($_GET['page']) ? (int)$_GET['page']: 1;
    $order = isset($_GET['order']) ? (int)$_GET['order']: 0;
    $prod_por_pag = isset($_GET['prod_pag']) ? (int)$_GET['prod_pag']: 4;
    $fltro_categoria = isset($_GET['categoria']) ? $_GET['categoria']: "no-cat";
    ?>

    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">Portfolio</span>
        </a>
    <?php

    # Comprueba la página actual para destacar el "boton" del header
    if($_SERVER['SCRIPT_NAME']=='/index.php') {
        $inicio_activo = "nav-link active";
        $contacto_activo = "nav-link";
        $admin_activo = "nav-link";
        $categoria_activo = "nav-link";
    } else if ($_SERVER['SCRIPT_NAME']=='/contacto.php') {
        $contacto_activo = "nav-link active";
        $inicio_activo = "nav-link";
        $admin_activo = "nav-link";
        $categoria_activo = "nav-link";
    } else if ($_SERVER['SCRIPT_NAME']=='/admin.php') {
        $admin_activo = "nav-link active";
        $inicio_activo = "nav-link";
        $contacto_activo = "nav-link";
        $categoria_activo = "nav-link";
    } else if ($_SERVER['SCRIPT_NAME']=='/productos.php') {
        $admin_activo = "nav-link";
        $inicio_activo = "nav-link";
        $contacto_activo = "nav-link";
        $categoria_activo = "nav-link active";
    } else {
        $contacto_activo = "nav-link";
        $inicio_activo = "nav-link";
        $admin_activo = "nav-link";
        $categoria_activo = "nav-link";
    }
    ?>

        <ul class="nav nav-pills">
            <?php
            # Comprueba si el usuario está logeado como admin, para mostrar el link a la zona "privada"
            if ($loggedIn == TRUE) {
                print('<li class="nav-item"><a href="admin.php" class="'.$admin_activo.'">ADMINISTRADOR</a></li>');
            }
            ?>
            <!-- Boton Menú INICIO -->
            <li class="nav-item"><a href="index.php" class="<?php print($inicio_activo) ?>" aria-current="page">INICIO</a></li>
            <!-- Menú desplegable CATEGORIAS -->
            <li class="nav-item dropdown">    
                <a class="<?php print($categoria_activo) ?> href="#" id="dropdownMenu1" data-bs-toggle="dropdown" aria-expanded="false">
                    CATEGORÍAS
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <?php foreach ($categorias as $i => $value) {
                        print('<li><a class="dropdown-item" href="?page=' . $page . '&categoria=' . $value . '&order=' . $order . '&prod_pag=' . $prod_por_pag . '">' . $value . '</a></li>');
                    }
                    ?>
                    <li><a class="dropdown-item" href="?page=<?php print($page) ?>&categoria=no-cat&order=<?php print($order)?>&prod_pag=<?php print($prod_por_pag)?>">No filtrar por categoría</a></li>
                </ul>
            </li>
            <!-- Boton Menú CONTACTO -->
            <li class="nav-item"><a href="contacto.php" class="<?php print($contacto_activo)?>">CONTACTO</a></li>
        </ul>
    </header>