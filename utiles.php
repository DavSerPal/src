<?php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function ano_actual() {
    return date("Y");
}

function cambia_fecha($productos) {
    $resultado = [];
    foreach ($productos as $producto) {

            $producto['fecha'] = strtotime(str_replace("/","-", $producto['fecha']));
            $resultado[] = $producto;
            }; 
        
    return $resultado;
}

function orden_por_fecha($lista, $orden) {
    $fechas = array_column($lista, 'fecha');

    if ($orden == 2) {
        array_multisort($fechas, SORT_DESC, $lista);
    } else if ($orden == 3) {
        array_multisort($fechas, SORT_ASC, $lista);
    }

    return $lista;
}

$page = isset($_GET['page']) ? (int)$_GET['page']: 1;
$order = isset($_GET['order']) ? (int)$_GET['order']: 0;
$prod_por_pag = isset($_GET['prod_pag']) ? (int)$_GET['prod_pag']: 4;
$fltro_categoria = isset($_GET['categoria']) ? $_GET['categoria']: "no-cat";
$id_producto = isset($_GET['id']) ? $_GET['id']: 0;

?>