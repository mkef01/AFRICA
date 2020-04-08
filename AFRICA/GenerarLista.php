<?php include 'HEADER.php'; ?>
<style>
    .hideextra {white-space: nowrap; overflow: hidden; text-overflow:ellipsis;}
</style>
<div class="col-lg-12">
    <div class="form-group col-lg-8 offset-lg-2">
        <div class="card" style="margin-top: 5px; background-color: ghostwhite">
            <h3 style="color: black; text-align: center" >Listas de Compras</h3>
            <input class="btn btn-dark col-lg-6 offset-lg-3" style="background-color: darkslategray; border-color: transparent" 
                   type="button" value="Generar Lista de Compras" name="agregar" /> 
        </div>
        <div class="card table-responsive" style="margin-top: 5px">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col" class="hideextra" style="text-align: center">Fecha de Creacion</th>
                        <th scope="col" class="hideextra" style="text-align: center">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: center" class="hideextra">25/ENE/2020</td>
                        <td style="text-align: center" class="hideextra">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-light">Ver Lista</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center" class="hideextra">25/ENE/2020</td>
                        <td style="text-align: center" class="hideextra">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-light">Ver Lista</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center" class="hideextra">25/ENE/2020</td>
                        <td style="text-align: center" class="hideextra">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-light">Ver Lista</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'FOOTER.php'; ?>