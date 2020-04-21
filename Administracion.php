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
                                <button type="button" class="btn btn-light" ng-click='modificar(datos[6])' ng-model="myVal">Modificar</button>
                                <button type="button" class="btn btn-primary" ng-change="borrar()" ng-model="myVal">Borrar</button>
                            </div>
                        </td>
                    </tr>'
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="loadMe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Resultado Operacion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{upate}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="enchulame" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Introduzca un Nombre" ng-model="nombre">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" class="form-control" id="Descripcion" placeholder="Introduzca un Descripcion" ng-model="descripcion">
                    </div>
                    <div class="form-group">
                        <label for="minimo">Stock Minimo</label>
                        <input type="number" class="form-control" id="minimo" placeholder="Introduzca el minimo" string-to-number ng-model="minimo">
                    </div>
                    <div class="form-group">
                        <label for="tipo">Tipo</label>
                        <select class="form-control" id="tipo" ng-model="tipo">
                            <option ng-repeat="x in tipaso" value="{{x[0]}}">{{x[1]}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="unidad">Unidad</label>
                        <select class="form-control" id="unidad" ng-model="unidad">
                        <option ng-repeat="x in unidasa" value="{{x[0]}}">{{x[1]}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="date" class="form-control" id="fecha" placeholder="yyyy/mm/dd" ng-model="fecha">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="card col-lg-12" style="margin-top: 5px; background-color: darkslategray" id="destino">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
    var app = angular.module('Angapp', []);
    app.directive('stringToNumber', function() {
        return {
            require: 'ngModel',
            link: function(scope, element, attrs, ngModel) {
                ngModel.$parsers.push(function(value) {
                    return '' + value;
                });
                ngModel.$formatters.push(function(value) {
                    return parseFloat(value);
                });
            }
        };
    });
    app.controller('AngCtrl',
        function($scope, $http, $q) {
            var datos = {
                "campos": "*",
                "tabla": "PRODUCTOSS"
            };
            $http.post("API_GET_SELECT.php", JSON.stringify(datos)).then(function(response) {
                    $scope.principal = response.data.datosgeneral;
                    console.log($scope.principal);
                },
                function(error, status) {});


            $scope.modificar = function($val) {
                $("#enchulame").modal({
                    backdrop: "static",
                    show: true
                });

                var datos = {
                    "campos": "id_tipo,tipo",
                    "tabla": "tipo_producto"
                };

                $http.post("API_GET_SELECT.php", JSON.stringify(datos)).then(function(response) {
                    $scope.tipaso = response.data.datosgeneral;
                },
                function(error, status) {});

                var datos = {
                    "campos": "*",
                    "tabla": "unidades"
                };

                $http.post("API_GET_SELECT.php", JSON.stringify(datos)).then(function(response) {
                    $scope.unidasa = response.data.datosgeneral;
                },
                function(error, status) {});

                var datos = {
                    "campos": "*",
                    "tabla": "PRODUCTOSS WHERE ID_PRODUCTO = " + $val
                };
                $http.post("API_GET_SELECT.php", JSON.stringify(datos)).then(function(response) {
                        $scope.nombre = response.data.datosgeneral[0][0];
                        $scope.descripcion = response.data.datosgeneral[0][1];
                        $scope.minimo = response.data.datosgeneral[0][2];
                        $scope.tipo = response.data.datosgeneral[0][7];
                        $scope.unidad = response.data.datosgeneral[0][8];
                        $scope.fecha = new Date(response.data.datosgeneral[0][5]);
                        console.log(response.data.datosgeneral[0][0]);
                    },
                    function(error, status) {});
                $('<input class="btn btn-dark" style="background-color: darkslategray; border-color: transparent" type="button" value="Modificar Item" name="agregar" />')
                .appendTo('#destino');        
                /* var datos = {
                    "camposactualizar": "stock_minimo = 2",
                    "tabla": "productos",
                    "condicionante": "id_producto = 1"
                }; */
                /* $http.post("API_GET_UPDATE.php", JSON.stringify(datos)).then(function(response) {
                        $scope.principal = response.data.datosgeneral;
                        if (response.data.datosgeneral[0] === 1) {
                            $scope.upate = "Modificado Exitosamente";


                        } else {
                            $scope.upate = response.data.datosgeneral[0];
                            $("#enchulame").modal({
                                backdrop: "static",
                                show: true
                            });
                        }
                    },
                    function(error, status) {}); */
            }
        });
</script>
<?php
include('FOOTER.php');
?>