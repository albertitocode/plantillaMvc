<div class="mt-5">
    <h3 class="display-4">Consultar Usuarios</h3>
</div>
<div class="row">
    <div class="col-md-3 mt-4">
        <input type="text" name="buscar" id="buscar" class="form-control"
        placeholder="Buscar por nombre o correo" data-url='<?php echo getUrl("Usuarios","Usuarios","buscar",false,"ajax");?>'>
    </div>
    <?php
    if(!empty($usuarios)){
    ?>
    <table class="table table-striped table hover ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Primer nombre</th>
                <th>Segundo nombre</th>
                <th>Primer apelldio</th>
                <th>Segundo apellido</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th>Rol</th>
                <th>Telefono</th>
                <th>Tipo de documento</th>
                <th>Numero de documento</th>
                

            </tr>
        </thead>
        <tbody>
            <?php
                foreach($usuarios as $usu){
                    // $clase="";
                    // $texto="";
                    echo "<tr>";
                        echo"<td>".$usu['usu_nombre_1']."</td>";
                        echo"<td>".$usu['usu_nombre_2']."</td>";
                        echo"<td>".$usu['usu_apellido_1']."</td>";
                        echo"<td>".$usu['usu_apellido_2']."</td>";
                        echo"<td>".$usu['usu_correo']."</td>";
                        echo"<td>". $usu['usu_contrasena']."</td>";
                        echo"<td>". $usu['rol_nombre']."</td>";
                        echo"<td>". $usu['usu_telefeno']."</td>";
                        echo"<td>". $usu['tipo_documento_nombre']."</td>";
                        echo"<td>". $usu['numero_documento']."</td>";
                        echo"<td>"."<button class='btn btn-primary'>Habilitar</button>"."</td>";

                        // if($usu['est_id']==1){
                        //     $clase='btn btn-danger';
                        //     $texto='Inhabilitar';
                        // }else if($usu['est_id']==2){
                        //     $clase='btn btn-success';
                        //     $texto='Habilitar';
                        // }
                        // echo"<td>";
                        //      if(!empty($clase))echo "<button type='button' class='$clase' id='cambiar_estado' data-url='".getUrl("Usuarios","Usuarios","posUpdateStatus",false,"ajax")."' data-id='".$usu['est_id']."' data-user='".$usu['usu_id']."'>$texto</button>";
                        
                        // echo "</td>";//arreglar
                
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
            }else{
                echo "está vacio";
            }
            ?>
        </tbody>
    </table>
</div>