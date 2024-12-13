
<style>
        .card-scroll {
            
            overflow-x: auto;  /* Habilita el scroll vertical */
        }
    </style>
<div 
class="mt-5">
    <h3 class="display-4">Consultar solicitudes</h3>
</div>
<div class="page-header">
    <h3 class="fw-bold mb-3">Señales</h3>
    <ul class="breadcrumbs mb-3">
        <li class="nav-home">
            <a href="<?php echo getUrl("Solicitud", "Solicitud", "postSolicitud"); ?>">
                <i class="icon-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">Nuevas señales</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card overflow-x-scroll">
            <div class="card-header">
                <div class="card-tittle">
                    Consulta
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- <div class="col-md-3 mt-4">
                        <input type="text" name="buscar" id="buscar" class="form-control"
                            placeholder="Buscar por nombre o correo" data-url='<?php echo getUrl("Usuarios", "Usuarios", "buscar", false, "ajax"); ?>'>
                    </div> -->
                    <?php
                    if (!empty($solicitud_seniales_nuevas)) {
                    ?>
                        <table class="table table-striped table hover ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <!-- <th>Fecha</th> -->
                                    <th>Descripcion</th>
                                    <th>Direccion</th>
                                    
                                    <th>Señal</th>
                                    <th>Tipo de solicitud</th>
                                    <th>Estado</th>
                                    <th>Usuario</th>
                                    <th>Telefono usuario</th>
                    
                                   

                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($solicitud_seniales_nuevas as $senial_nueva) {
                                // $clase="";
                                // $texto="";
                                echo "<tr>";
                                echo "<td>" . $senial_nueva['solicitud_senial_nueva_id'] . "</td>";
                                // echo "<td>" . $senial_malo['solicitud_senial_mal_estado_fecha_creacion'] . "</td>"; //cambiar el nombre en la db
                                echo "<td>" . $senial_nueva['solicitud_senial_nueva_descripcion'] . "</td>";
                                echo "<td>" . $senial_nueva['solicitud_senial_nueva_direccion'] . "</td>";
                                echo "<td>" . $senial_nueva['senial_nombre'] . "</td>";
                                echo "<td>" . $senial_nueva['tipo_solicitud_nombre'] . "</td>";
                                echo "<td>" . $senial_nueva['estado_nombre'] . "</td>";
                                echo "<td>" . $senial_nueva['usuario_nombre_1'] ."  ". $senial_nueva['usuario_apellido_1'] ."</td>";
                                echo "<td>" . $senial_nueva['usuario_telefono'] . "</td>";
                                

                                // if($usu['estado_id']==1){
                                //     $clase='btn btn-danger';
                                //     $texto='Inhabilitar';
                                // }else if($usu['estado_id']==2){
                                //     $clase='btn btn-success';
                                //     $texto='Habilitar';
                                // }
                                // echo"<td>";
                                //      if(!empty($clase))echo "<button type='button' class='$clase' id='cambiar_estado' data-url='".getUrl("Usuarios","Usuarios","posUpdateStatus",false,"ajax")."' data-id='".$usu['estado_id']."' data-user='".$usu['usuario_id']."'>$texto</button>";

                                // echo "</td>";//arreglar

                                // //     echo"<td>"
                                // //         ."<a href='".getUrl("Usuarios","Usuarios","getUpdate",array("usu_id" =>$usu['usu_id']))."'>"
                                // //             ."<button class='btn btn-primary'>Editar</button>"
                                // //         ."</a>";
                                // //     "</td>";
                                // //     echo"<td>"
                                // //     ."<a href='".getUrl("Usuarios","Usuarios","getDelete",array("usu_id" =>$usu['usu_id']))."'>"
                                // //         ."<button class='btn btn-danger'>Elimminar</button>"
                                // //     ."</a>";
                                // // "</td>";
                                // echo "</tr>";
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