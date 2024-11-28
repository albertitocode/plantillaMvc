<div class="page-header">
    <h3 class="fw-bold mb-3">Inhabiliar o habilitar usuarios</h3>
    <ul class="breadcrumbs mb-3">
        <li class="nav-home">
            <a href="#">
                <i class="icon-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">Usuarios</a>
        </li>

    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tittle">
                    Actualizacion Usuarios
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo getUrl("Usuarios", "Usuarios", "updateStatus"); ?>" method="post" id="form1">
                    <div class="form-group col-lg-4">
                        <label for="usuario_id">Digite el id del usuario</label>
                        <input type="text" name="usuario_id" id="" class="form-control" placeholder="Id">

                    </div>
                    <div class="mt-5">
                    <input type="submit" value="Buscar" class="btn btn-success">
                </div>
                </form>
               
                <div class="row">
                    
                    <?php
                    if (!empty($usuarios)) {
                    ?>
                        <table class="table table-striped table hover ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Numero de documento</th>
                                    <th>Primer nombre</th>
                                    <th>Primer apelldio</th>
                                    <th>Correo</th>
                                    <th>Rol</th>
                                    <th>Estado</th>
                                    <th>habilitar/inhabilitar</th>



                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($usuarios as $usu) {
                                // $clase="";
                                // $texto="";
                                echo "<tr>";
                                echo "<td>" . $usu['usuario_id'] . "</td>";
                                echo "<td>" . $usu['usuario_num_identificacion'] . "</td>";
                                echo "<td>" . $usu['usuario_nombre_1'] . "</td>";
                                echo "<td>" . $usu['usuario_apellido_1'] . "</td>";
                                echo "<td>" . $usu['usuario_correo'] . "</td>";
                                echo "<td>" . $usu['rol_nombre'] . "</td>";
                                echo "<td>" . $usu['estado_nombre'] . "</td>";

                                if ($usu['estado_id'] == 1) {
                                    $clase = 'btn btn-danger';
                                    $texto = 'Inhabilitar';
                                } else if ($usu['estado_id'] == 2) {
                                    $clase = 'btn btn-success';
                                    $texto = 'Habilitar';
                                }
                                echo "<td>";
                                if (!empty($clase)) echo "<button type='button' class='$clase' id='cambiar_estado' data-url='" . getUrl("Usuarios", "Usuarios", "posUpdateStatus", false, "ajax") . "' data-id='" . $usu['estado_id'] . "' data-user='" . $usu['usuario_id'] . "'>$texto</button>";

                                echo "</td>"; //arreglar

                                //     echo"<td>"
                                //         ."<a href='".getUrl("Usuarios","Usuarios","getUpdate",array("usu_id" =>$usu['usu_id']))."'>"
                                //             ."<button class='btn btn-primary'>Editar</button>"
                                //         ."</a>";
                                //     "</td>";
                                //     echo"<td>"
                                //     ."<a href='".getUrl("Usuarios","Usuarios","getDelete",array("usu_id" =>$usu['usu_id']))."'>"
                                //         ."<button class='btn btn-danger'>Elimminar</button>"
                                //     ."</a>";
                                // "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "está vacio";
                        }
                            ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>