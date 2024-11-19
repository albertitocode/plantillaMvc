<?php
                foreach($usuarios as $usu){
                    $clase="";
                    $texto="";
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
                
                        echo"<td>"
                            ."<a href='".getUrl("Usuarios","Usuarios","getUpdate",array("usu_id" =>$usu['usu_id']))."'>"
                                ."<button class='btn btn-primary'>Editar</button>"
                            ."</a>";
                        "</td>";
                        echo"<td>"
                        ."<a href='".getUrl("Usuarios","Usuarios","getDelete",array("usu_id" =>$usu['usu_id']))."'>"
                            ."<button class='btn btn-danger'>Elimminar</button>"
                        ."</a>";
                    "</td>";
                    echo "</tr>";
                   
                }
            ?>