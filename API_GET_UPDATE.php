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
    if (strlen($datafinal->camposactualizar) && strlen($datafinal->tabla) && strlen($datafinal->condicionante)) {
        $campamento = $datafinal->camposactualizar;
        $destino = $datafinal->tabla;
        $salvoducto = $datafinal->condicionante;
        try {
            $sql = "UPDATE " . $destino . " SET " . $campamento . " WHERE " . $salvoducto;
            if ($mysqli->query($sql)) {
                $dat['datosgeneral'][] = 1;
                response($dat);
            }else{
                $dat['datosgeneral'][] = $mysqli->error;
                response($dat);
            }
        } catch (Exception $e) {
            $dat['datosgeneral'][] = 0;
            response($dat);
        } finally {
            $mysqli->close();
        }

    } else {
        response("Nada que ver AQUI");
    }
}

function response($resultado2)
{
    $json = json_encode($resultado2);
    echo $json;
}
