<?php
header("Content-Type:application/json");
$dagte = file_get_contents('php://input');
$datafinal = json_decode($dagte);
include './SQLSERVER.php';
$mysqli = new mysqli($servidor, $usuario, $clave, $base);
$mysqli->set_charset("utf8");
if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
} else {
    if (strlen($datafinal->campos) && strlen($datafinal->tabla)) {
        $campamento = $datafinal->campos;
        $destino = $datafinal->tabla;
        $sql = "SELECT ".$campamento." FROM ".$destino;
        $mysqli->multi_query($sql);
        $resultado = $mysqli->store_result(0);
        $dat = array();
        $var = 0;
        while ($row = $resultado -> fetch_row()) {
            $dat['datosgeneral'][] = $row;
        }
        $mysqli->close();
        response($dat);
    }else{
        response("No incluye los POST");
    }
}

function response($resultado2)
{
    $json = json_encode($resultado2);
    echo $json;
}
?>