<?php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$page = isset($_GET['page']) ? (int)$_GET['page']: 1;
$order = isset($_GET['order']) ? (int)$_GET['order']: 0;
$prod_por_pag = isset($_GET['prod_pag']) ? (int)$_GET['prod_pag']: 4;
$fltro_categoria = isset($_GET['categoria']) ? $_GET['categoria']: "no-cat";
$id_producto = isset($_GET['id']) ? $_GET['id']: 0;

?>