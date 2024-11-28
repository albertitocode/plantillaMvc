<div class="mt-5">
    <h3 class="display-4">Consultar Solicitud de vias</h3>
</div>
<div class="row">
    <div class="col-md-3 mt-4">
        <input type="text" name="buscar" id="buscar" class="form-control" placeholder="Buscar por nombre o correo"
            data-url='<?php echo getUrl("Solicitud", "Solicitud", "buscar", false, "ajax"); ?>'>
    </div>
    <?php
    if (!empty($vias)) {
        ?>
        <table class="table table-striped table hover mt-2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FECHA DE CREACION</th>
                    <th>DESCRIPCION</th>
                    <th>DAÑO</th>
                    <th>USUARIO</th>
                    <th>DIRECCION</th>
                    <th>IMAGEN</th>
                    <th>ESTADO</th>


                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($vias as $via) {
                    // $clase="";
                    // $texto="";
                    echo "<tr>";
                    echo "<td>" . $via['solicitud_via_mal_estado_id'] . "</td>";
                    echo "<td>" . $via['solicitud_via_mal_estado_fecha_creacion'] . "</td>";

                    echo "<td>" . $via['solicitud_via_mal_estado_descripcion'] . "</td>";

                    echo "<td>" . $via['danio_nombre'] . "</td>";

                    echo "<td>" . $via['usuario_num_identificacion'] . "</td>";

                    echo "<td>" . $via['solicitud_via_mal_estado_direccion'] . "</td>";

                    echo "<td>" . $via['solicitud_via_mal_estado_imagen'] . "</td>";

                    echo "<td>" . $via['estado_nombre'] . "</td>";


                    echo "</tr>";

                }
    }
    ?>
        </tbody>
    </table>
</div>