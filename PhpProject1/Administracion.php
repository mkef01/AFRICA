<?php

include 'HEADER.php';
include './SQLSERVER.php';
$mysqli = new mysqli($servidor, $usuario, $clave, $base);
$mysqli->set_charset("utf8");

if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
} else {
    
}
$mysqli->close();
?>
<style>
    .hideextra {white-space: nowrap; overflow: hidden; text-overflow:ellipsis;}
</style>
<div class="col-lg-12">
    <div class="form-group col-lg-12">
        <div class="card col-lg-8 offset-lg-2" style="margin-top: 5px; background-color: darkslategray">
            <input class="btn btn-dark" style="background-color: darkslategray; border-color: transparent" 
                   type="button" value="Agregar Item" name="agregar" /> 
        </div>
        <div class="card table-responsive" style="margin-top: 5px">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col" class="hideextra" style="text-align: center">Nombre</th>
                        <th scope="col" class="hideextra" style="text-align: center">Descripcion</th>
                        <th scope="col" class="hideextra" style="text-align: center">Stock Minimo</th>
                        <th scope="col" class="hideextra" style="text-align: center">Tipo</th>
                        <th scope="col" class="hideextra" style="text-align: center">Unidad</th>
                        <th scope="col" class="hideextra" style="text-align: center">Fecha Agregado</th>
                        <th scope="col" class="hideextra" style="text-align: center">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th style="text-align: center" class="hideextra">Pasta SARA capellini</th>
                        <td style="text-align: center" class="hideextra">Pasta Italiana marca SARA N°9 capellini</td>
                        <td style="text-align: center" class="hideextra">2</td>
                        <td style="text-align: center" class="hideextra">Pasta</td>
                        <td style="text-align: center" class="hideextra">UN</td>
                        <td style="text-align: center" class="hideextra">05/FEB/2020</td>
                        <td style="text-align: center" class="hideextra">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-light">Modificar</button>
                                <button type="button" class="btn btn-primary">Borrar</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th style="text-align: center" class="hideextra">Pasta SARA capellini</th>
                        <td style="text-align: center" class="hideextra">Pasta Italiana marca SARA N°9 capellini</td>
                        <td style="text-align: center" class="hideextra">2</td>
                        <td style="text-align: center" class="hideextra">Pasta</td>
                        <td style="text-align: center" class="hideextra">UN</td>
                        <td style="text-align: center" class="hideextra">05/FEB/2020</td>
                        <td style="text-align: center" class="hideextra">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-light">Modificar</button>
                                <button type="button" class="btn btn-primary">Borrar</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th style="text-align: center" class="hideextra">Pasta SARA capellini</th>
                        <td style="text-align: center" class="hideextra">Pasta Italiana marca SARA N°9 capellini</td>
                        <td style="text-align: center" class="hideextra">2</td>
                        <td style="text-align: center" class="hideextra">Pasta</td>
                        <td style="text-align: center" class="hideextra">UN</td>
                        <td style="text-align: center" class="hideextra">05/FEB/2020</td>
                        <td style="text-align: center" class="hideextra">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-light">Modificar</button>
                                <button type="button" class="btn btn-primary">Borrar</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php

include 'FOOTER.php';
?>