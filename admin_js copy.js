var app = angular.module('Angapp', []);
app.directive('stringToNumber', function () {
    return {
        require: 'ngModel',
        link: function (scope, element, attrs, ngModel) {
            ngModel.$parsers.push(function (value) {
                return '' + value;
            });
            ngModel.$formatters.push(function (value) {
                return parseFloat(value);
            });
        }
    };
});
app.controller('AngCtrl',
    function ($scope, $http, $q, $compile, $sce) {
        var datos = {
            "campos": "*",
            "tabla": "PRODUCTOSS"
        };
        $http.post("API_GET_SELECT.php", JSON.stringify(datos)).then(function (response) {
            $scope.principal = response.data.datosgeneral;
            console.log($scope.principal);
        },
            function (error, status) { }

        );
        $scope.nummodificado = 0;            


        $scope.modificar = function ($val) {
            $("#enchulame").modal({
                backdrop: "static",
                show: true
            });

            var datos = {
                "campos": "id_tipo,tipo",
                "tabla": "tipo_producto"
            };

            $http.post("API_GET_SELECT.php", JSON.stringify(datos)).then(function (response) {
                $scope.tipaso = response.data.datosgeneral;
            },
                function (error, status) { });

            var datos = {
                "campos": "*",
                "tabla": "unidades"
            };

            $http.post("API_GET_SELECT.php", JSON.stringify(datos)).then(function (response) {
                $scope.unidasa = response.data.datosgeneral;
            },
                function (error, status) { });

            var datos = {
                "campos": "*",
                "tabla": "PRODUCTOSS WHERE ID_PRODUCTO = " + $val
            };
            $scope.idvalor = $val;
            $http.post("API_GET_SELECT.php", JSON.stringify(datos)).then(function (response) {
                $scope.nombre = response.data.datosgeneral[0][0];
                $scope.descripcion = response.data.datosgeneral[0][1];
                $scope.minimo = response.data.datosgeneral[0][2];
                $scope.tipo = response.data.datosgeneral[0][7];
                $scope.unidad = response.data.datosgeneral[0][8];
                $scope.fecha = new Date(response.data.datosgeneral[0][5]);
                console.log(response.data.datosgeneral[0][0]);
            },
                function (error, status) { });
            if ($scope.nummodificado < 1) {
                var el = '<input class="btn btn-dark" style="background-color: darkslategray; border-color: transparent" type="button" value="Modificar Item" name="agregar" ng-click="modificarbase()" ng-model="myVal" />';
                var compilado = $compile(el)($scope);
                $(compilado).appendTo('#destino');
                $scope.nummodificado = 1;
            }
        }

        $scope.modificarbase = function () {
            var a = $('#fecha').val();
            var datos = {
                "camposactualizar": "nombre = '" + $scope.nombre + "' ,descripcion = '" + $scope.descripcion + "' ,stock_minimo = " + $scope.minimo +
                    " ,tipo = '" + $scope.tipo + "' ,producto_unidades = " + $scope.unidad + " ,fecha_ultima_compra = '" + a + "'",
                "tabla": "productos",
                "condicionante": "id_producto = " + $scope.idvalor
            };
            $http.post("API_GET_UPDATE.php", JSON.stringify(datos)).then(function (response) {
                if (response.data.datosgeneral[0] === 1) {
                    $("#enchulame").modal("hide");
                    $scope.upate = "Modificado Exitosamente";
                    $("#loadMe").modal({
                        show: true
                    });
                    var datos = {
                        "campos": "*",
                        "tabla": "PRODUCTOSS"
                    };
                    $http.post("API_GET_SELECT.php", JSON.stringify(datos)).then(function (response) {
                        $scope.principal = response.data.datosgeneral;
                        console.log($scope.principal);
                    },
                        function (error, status) { }

                    );

                } else {
                    $("#enchulame").modal("hide");
                    $scope.upate = response.data.datosgeneral[0];
                    $("#loadMe").modal({
                        show: true
                    });
                }
            },
                function (error, status) { });
        }
    });