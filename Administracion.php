<?php
include('HEADER.php');
?>
<style>
    .hideextra {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<div class="col-lg-12" ng-app="Angapp" ng-controller="AngCtrl">
    <div class="form-group col-lg-12">
        <div class="card col-lg-8 offset-lg-2" style="margin-top: 5px; background-color: darkslategray">
            <input class="btn btn-dark" style="background-color: darkslategray; border-color: transparent" type="button" value="Agregar Item" name="agregar" />
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
                    <tr ng-repeat="datos in principal">
                        <td style="text-align: center" class="hideextra">{{datos[0]}}</td>
                        <td style="text-align: center" class="hideextra">{{datos[1]}}</td>
                        <td style="text-align: center" class="hideextra">{{datos[2]}}</td>
                        <td style="text-align: center" class="hideextra">{{datos[3]}}</td>
                        <td style="text-align: center" class="hideextra">{{datos[4]}}</td>
                        <td style="text-align: center" class="hideextra">{{datos[5]}}</td>
                        <td style="text-align: center" class="hideextra">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-light">Modificar</button>
                                <button type="button" class="btn btn-primary">Borrar</button>
                            </div>
                        </td>
                    </tr>'
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    var app = angular.module('Angapp', []);
app.controller('AngCtrl',
    function ($scope, $http, $q) {
        var datos = {
            "campos": "*",
            "tabla": "PRODUCTOSS"
        };
        $http.post("API_GET_SELECT.php", JSON.stringify(datos)).then(function (response) {
            $scope.principal = response.data.datosgeneral;
            console.log($scope.principal);
        },
            function (error, status) {
            });
    });
</script>
<?php
include('FOOTER.php');
?>