<?php
include_once '../model/Solicitud/SolicitudModel.php';

class SolicitudController
{
    public function getSolicitud()
    {
        $obj = new SolicitudModel();

        $sql = "SELECT * FROM tipo_solicitudes";
        $tipo_solicitud = pg_fetch_all($obj->consult($sql));

        include_once '../view/solicitudes/registrar.php';
    }
    public function buscarSolicitud()
    {
        $obj = new SolicitudModel();

        $id_solicitud = $_POST['id_solicitud'];
        // $sql = "SELECT * FROM tipo_solicitudes WHERE tipo_solicitud";
        // $tipo_solicitud = pg_fetch_all($obj->consult($sql));

        if ($id_solicitud == 1) {
            // include_once '../view/solicitudSenal/malEstado/create.php';
            redirect(getUrl("Solicitud", "Solicitud", "getCreateSenialMalEstado"));
        } else if ($id_solicitud == 2) {
            // include_once '../view/solicitudVial/create.php';
            redirect(getUrl("Solicitud", "Solicitud", "GetCreateVia"));
        } else if ($id_solicitud == 4) {
            redirect(getUrl("Solicitud", "Solicitud", "getCreateAccidente"));
        } else if ($id_solicitud == 5) {
            redirect(getUrl("Solicitud", "Solicitud", "getCreateNuevaSenial"));
        } else if ($id_solicitud == 3) {
            redirect(getUrl("Solicitud", "Solicitud", "getCreateReductorMalEstado"));
        } else if ($id_solicitud == 6) {
            redirect(getUrl("Solicitud", "Solicitud", "getCreateReductorNuevo"));
        }
    }


    public function postSolicitud()
    {

        $obj = new SolicitudModel();

        $sql = "SELECT * FROM tipo_solicitudes";
        $tipo_solicitud = pg_fetch_all($obj->consult($sql));

        include_once '../view/solicitudes/consultar.php';
    }

    public function obtenerSolicitudes()
    {
        $obj = new SolicitudModel();

        $id_solicitud = $_POST['id_solicitud'];

        if ($id_solicitud == 1) {
            // include_once '../view/solicitudSenal/malEstado/create.php';
            redirect(getUrl("Solicitud", "Solicitud", "getVias"));
        } else if ($id_solicitud == 2) {
            // include_once '../view/solicitudVial/create.php';
            redirect(getUrl("Solicitud", "Solicitud", "getVias"));
        } else if ($id_solicitud == 4) {
            redirect(getUrl("Solicitud", "Solicitud", "getVias"));
        } else if ($id_solicitud == 5) {
            redirect(getUrl("Solicitud", "Solicitud", "getVias"));
        } else if ($id_solicitud == 3) {
            redirect(getUrl("Solicitud", "Solicitud", "getVias"));
        } else if ($id_solicitud == 6) {
            redirect(getUrl("Solicitud", "Solicitud", "getVias"));
        }


    }
    public function getCreateNuevaSenial()
    {
        $obj = new SolicitudModel();

        $sql = "SELECT * FROM categoria_seniales";
        $categoria_senal = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM tipo_seniales";
        $tipo_senal = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT  * FROM seniales";
        $seniales = pg_fetch_all($obj->consult($sql));

        include_once '../view/solicitudSenal/nuevo/create.php';
    }

    public function postCreateNuevaSenial()
    {

        $obj = new SolicitudModel();

        //añadir campo fecha
        //agregar los cambios de estados

        $categoria_senal_id = $_POST['categoria_senal_id'];
        $tipo_senal_id = $_POST['tipo_senal_id'];
        $senial_id = $_POST['senial_id'];
        $solicitud_senial_nueva_descripcion = $_POST['solicitud_senial_nueva_descripcion'];
        $solicitud_senial_nueva_direccion = $_POST['solicitud_senial_nueva_direccion'];

        $usuario_id = $_SESSION['id'];
        //solucionar el problema de la rideccion
        $sql = "INSERT INTO solicitud_seniales_nuevas (solicitud_senial_nueva_descripcion,solicitud_senial_nueva_direccion,senial_id,usuario_id,tipo_solicitud_id,estado_id) VALUES('$solicitud_senial_nueva_descripcion','$solicitud_senial_nueva_direccion',$senial_id,$usuario_id,5,1)";
        $ejecutar = $obj->insert($sql);
        if ($ejecutar) {
            redirect(getUrl("Solicitud", "Solicitud", "getSolicitud"));//corregir el redirect
        } else {
            echo "Se ha presentado un error al insertar";
        }



        // $categoria_reduc_id = $_POST[''];
        // $categoria_reduc_nombre = $_POST[''];
        // $tipo_reduc_id = $_POST[''];

        // $sql = "INSERT INTO  VALUES()";
        // $ejecutar = $obj->insert($sql);
        // if ($ejecutar) {
        //     redirect(getUrl("Solicitud", "Solicitud", ""));
        // } else {
        //     echo "Se ha presentado un error al insertar";
        // }


    }

    public function getCreateSenialMalEstado()
    {
        $obj = new SolicitudModel();

        $sql = "SELECT * FROM categoria_seniales";
        $categoria_senal = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM tipo_seniales";
        $tipo_senal = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT  * FROM seniales";
        $seniales = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM danios where tipo_solicitud_id=1";
        $danio = pg_fetch_all($obj->consult($sql));

        include_once '../view/solicitudSenal/malEstado/create.php';
    }
    public function postCreateSenialMalEstado()
    {

        $obj = new SolicitudModel();

        //añadir campo fecha
        //agregar los cambios de estados
        $categoria = $_POST['categoria_senal_id'];
        $categoria_senal_id = $_POST['categoria_senal_id'];
        $tipo_senal_id = $_POST['tipo_senal_id'];
        $senial_id = $_POST['senial_id'];
        $solicitud_senial_mal_estado_descripcion = $_POST['solicitud_senial_mal_estado_descripcion'];
        $solicitud_senial_mal_estado_direccion = $_POST['solicitud_senial_mal_estado_direccion'];
        $solicitud_senial_mal_estado_imagen = $_POST['solicitud_senial_mal_estado_imagen'];
        $danio_id = $_POST['danio_id'];
        $usuario_id = $_SESSION['id'];

        $sql = "INSERT INTO solicitud_seniales_mal_estado (senial_id,solicitud_senial_mal_estado_descripcion,danio_id,usuario_id,solicitud_senial_mal_estado_direccion,solicitud_senial_mal_estado_imagen,tipo_solicitud_id,estado_id) VALUES($senial_id,'$solicitud_senial_mal_estado_descripcion',$danio_id,$usuario_id,'$solicitud_senial_mal_estado_direccion','$solicitud_senial_mal_estado_imagen',1,1)";
        $ejecutar = $obj->insert($sql);
        if ($ejecutar) {
            redirect(getUrl("Solicitud", "Solicitud", "getSolicitud"));//corregir el redirect
        } else {
            echo "Se ha presentado un error al insertar";
        }



        // $categoria_reduc_id = $_POST[''];
        // $categoria_reduc_nombre = $_POST[''];
        // $tipo_reduc_id = $_POST[''];

        // $sql = "INSERT INTO  VALUES()";
        // $ejecutar = $obj->insert($sql);
        // if ($ejecutar) {
        //     redirect(getUrl("Solicitud", "Solicitud", ""));
        // } else {
        //     echo "Se ha presentado un error al insertar";
        // }


    }






    //Empieza reductor
    public function getCreateReductorMalEstado()
    {
        $obj = new SolicitudModel();

        $sql = "SELECT * FROM categoria_reductores";
        $categoria_reductores = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT  * FROM reductores";
        $reductores = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM danios where tipo_solicitud_id=1";
        $danio = pg_fetch_all($obj->consult($sql));

        include_once '../view/solicitudReductor/malEstado/create.php';


    }
    public function postCreateReductorMalEstado()
    {
        $obj = new SolicitudModel();

        //añadir campo fecha
        //agregar los cambios de estados
        // $categoria = $_POST['categoria_reductor_id'];
        // $senial_id = $_POST['senial_id'];
        $solicitud_reductores_mal_estado_descripcion = $_POST['solicitud_reductores_mal_estado_descripcion'];
        $carrera = $_POST['carrera'];
        $calle = $_POST['calle'];
        $barrio = $_POST['barrio'];
        $direccion = "carrera $carrera - calle $calle - barrio $barrio";
        $solicitud_reductores_mal_estado_imagen = $_POST['solicitud_reductores_mal_estado_imagen'];
        $danio_id = $_POST['danio_id'];
        $usuario_id = $_SESSION['id'];
        $reductor_id = $_POST['reductor_id'];

        $sql = "INSERT INTO solicitud_reductores_mal_estado (solicitud_reductores_mal_estado_descripcion,solicitud_reductores_mal_estado_direccion,solicitud_reductores_mal_estado_imagen,reductor_id,danio_id,usuario_id,tipo_solicitud_id,estado_id) VALUES('$solicitud_reductores_mal_estado_descripcion','$direccion','$solicitud_reductores_mal_estado_imagen',$reductor_id,$danio_id,$usuario_id,3,1)";
        var_dump($sql);
        $ejecutar = $obj->insert($sql);
        if ($ejecutar) {
            redirect(getUrl("Solicitud", "Solicitud", "getSolicitud"));//corregir el redirect
        } else {
            echo "Se ha presentado un error al insertar";
        }



    }
    public function getCreateReductorNuevo()
    {
        $obj = new SolicitudModel();

        $sql = "SELECT * FROM categoria_reductores";
        $categoria_reductores = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT  * FROM reductores";
        $reductores = pg_fetch_all($obj->consult($sql));

        include_once '../view/solicitudReductor/nuevo/create.php';


    }
    public function postCreateReductorNuevo()
    {
        $obj = new SolicitudModel();

        //añadir campo fecha
        //agregar los cambios de estados
        // $categoria = $_POST['categoria_reductor_id'];
        // $senial_id = $_POST['senial_id'];
        $solicitud_reductor_nuevo_descripcion = $_POST['solicitud_reductor_nuevo_descripcion'];
        $carrera = $_POST['carrera'];
        $calle = $_POST['calle'];
        $barrio = $_POST['barrio'];
        $direccion = "carrera $carrera, calle $calle, barrio $barrio";
        $solicitud_reductor_nuevo_imagen = $_POST['solicitud_reductor_nuevo_imagen'];
        var_dump($solicitud_reductor_nuevo_imagen);
        // $danio_id = $_POST['danio_id'];
        $usuario_id = $_SESSION['id'];
        $reductor_id = $_POST['reductor_id'];

        $sql = "INSERT INTO solicitud_reductores_nuevos(solicitud_reductor_nuevo_descripcion,solicitud_reductor_nuevo_direccion,solicitud_reductor_nuevo_imagen,reductor_id,usuario_id,tipo_solicitud_id,estado_id) VALUES('$solicitud_reductor_nuevo_descripcion','$direccion','$solicitud_reductor_nuevo_imagen',$reductor_id,$usuario_id,6,1)";
        $ejecutar = $obj->insert($sql);
        if ($ejecutar) {
            redirect(getUrl("Solicitud", "Solicitud", "getSolicitud"));//corregir el redirect
        } else {
            echo "Se ha presentado un error al insertar";
        }


    }
    //Termina Reductor


    //empieza Vias

    public function GetCreateVia()
    {

        $obj = new SolicitudModel();

        $sql = "SELECT * FROM tipo_solicitudes";
        $tipo_solicitudes = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM danios WHERE tipo_solicitud_id=2";
        $danios = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM estados";
        $estado = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM tipo_solicitudes";
        $tipo_solicitudes = pg_fetch_all($obj->consult($sql));



        include_once '../view/solicitudVial/create.php';


    }



    public function PostCreateVia()
    {

        $obj = new SolicitudModel();
        $carrera = $_POST['carrera'];
        $calle = $_POST['calle'];
        $barrio = $_POST['barrio'];
        $direccion = "carrera $carrera, calle $calle, barrio $barrio";
        $descripcion = $_POST['solicitud_via_mal_estado_descripcion'];
        $imagen = $_POST['solicitud_via_mal_estado_imagen'];
        $danio = $_POST['danio_id'];
        $usuario = $_SESSION['id'];

        //VALIDACIONES
        $validacion = true;
        $campos = [
            'carrera' => 'El campo carrera es requerido',
            'calle' => 'El campo calle es requerido',
            'barrio' => 'El campo barrio es requerido',
            'danio' => 'El campo daño es requerido'
        ];

        // Bucle para validar los campos
        foreach ($campos as $campo => $mensaje) {
            if (empty($$campo)) {  // Se usa $$campo para acceder dinámicamente a la variable

                $_SESSION['errores'][] = $mensaje;
                $validacion = false;
            }

        }

        // function validarNumeros($input){
        //     $patron = "/^[0-9]+$/";
        //     return preg_match($patron,$input)===1;

        // }

        $sql = "INSERT INTO solicitud_vias_mal_estado (solicitud_via_mal_estado_descripcion, solicitud_via_mal_estado_direccion, solicitud_via_mal_estado_imagen, danio_id, usuario_id, 
        tipo_solicitud_id, estado_id) VALUES( '$descripcion', '$direccion', '$imagen', $danio,  $usuario,   2, 1)";

        if ($validacion == true) {
            $ejecutar = $obj->insert($sql);

            if ($ejecutar) {
                echo "<script>
                Swal.fire({
                    title: '¡Gracias!',
                    text: 'Tu solicitud se ha registrado correctamente.',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    // Redirigimos al usuario después de que cierre la alerta
                    if (result.isConfirmed) {
                        window.location.href = '" . getUrl("Solicitud", "Solicitud", "GetCreateVia") . "';
                    }
                });
            </script>";
            } else {
                echo "Se ha presentado un error al insertar";
            }
        } else {
            redirect(getUrl("Usuarios", "Usuarios", "getCreate"));
        }






        // if ($ejecutar) {


        // } else {
        //     echo "Se ha presentado un error al insertar";


        // }


    }

    public function getVias()
    {

        $obj = new SolicitudModel();
        $sql = "SELECT sv.*, d.danio_nombre,e.estado_nombre, u.usuario_num_identificacion FROM solicitud_vias_mal_estado sv,
         danios d, estados e, usuarios u WHERE sv.danio_id=d.danio_id AND e.estado_id=sv.estado_id AND 
         u.usuario_id=sv.usuario_id ORDER BY sv.solicitud_via_mal_estado_id ASC";
        //$sql="SELECT*FROM usuario";
        $vias = $obj->consult($sql);

        if ($vias) {
            include_once '../view/solicitudVial/consult.php';

        } else {

            echo "<script>
                Swal.fire({
                    title: '¡Lo sentimos!',
                    text: 'No hay solicitudes Registradas',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    // Redirigimos al usuario después de que cierre la alerta
                    if (result.isConfirmed) {
                        window.location.href = '" . getUrl("Solicitud", "Solicitud", "GetCreateVia") . "';
                    }
                });
            </script>";

        }

    }
    //termina vias


    //Empieza Accidentes
    public function GetCreateAccidente()
    {

        $obj = new SolicitudModel();

        $sql = "SELECT * FROM tipo_solicitudes";
        $tipo_solicitudes = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM barrios";
        $barrios = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM letras_via";
        $letras = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM tipo_via";
        $vias = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM orientaciones";
        $orientaciones = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM tipo_choques";
        $choques = pg_fetch_all($obj->consult($sql));


        include_once '../view/solicitudAccidente/create.php';


    }

    public function getDetalleChoque()
    {
        echo "si";
        if (isset($_POST['tipo_choque_id'])) {
            $tipo_choque = $_POST['tipo_choque'];

            $sql = "SELECT * from choque_detalles WHERE tipo_choque_id=$tipo_choque";
            $detalleChoques = pg_fetch_all($this->consult($sql));


            include_once '../view/solicitudAccidente/create.php';


        }
    }

    public function PostCreateAccidente()
    {
        $obj = new SolicitudModel();

        $tipo_via = $_POST['tipo_via'];
        $num_via = $_POST['num_via'];
        $letra1 = $_POST['letra1'];
        $bis = $_POST['bis'];
        $orientacion = $_POST['orientacion'];
        $numero2 = $_POST['numero2'];
        $letra2 = $_POST['letra2'];
        $numero3 = $_POST['numero3'];
        $barrio = $_POST['barrio'];
        $direccion = "$tipo_via $num_via $letra1$bis $orientacion $numero2 $letra2 $numero3, barrio $barrio";
        $descripcion = $_POST['observacion'];
        $imagen = $_POST['imagen'];
        $tipo_choque = $_POST['tipo_choque'];
        $lesionados = $_POST['lesionados'];


        if (!$lesionados) {
            $lesionados = "Sin lesionados";
        }

        if (!$bis) {
            $bis = "Sin bis";
        }

        //VALIDACIONES
        $validacion = true;
        $campos = [
            'tipo_via' => 'El campo tipo de vía es requerido',
            'num_via' => 'El campo número de vía es requerido',
            'barrio' => 'El campo barrio es requerido',
            'tipo_choque' => 'El campo tipo de choque es requerido'
        ];

        // Bucle para validar los campos
        foreach ($campos as $campo => $mensaje) {
            if (empty($$campo)) {  // Se usa $$campo para acceder dinámicamente a la variable

                $_SESSION['errores'][] = $mensaje;
                $validacion = false;
            }

        }

        // function validarNumeros($input){
        //     $patron = "/^[0-9]+$/";
        //     return preg_match($patron,$input)===1;

        // }

        $sql = "INSERT INTO solicitud_accidentes (solicitud_accidente_direccion,tipo_choque_id,
        solicitud_accidente_imagen,solicitud_accidente_descripcion,solicitud_accidente_lesionados,estado_id,usuario_id,tipo_solicitud_id) VALUES (
    $direccion, $tipo_choque, $imagen,$descripcion, 3, 1, 4 );";

        if ($validacion == true) {
            $ejecutar = $obj->insert($sql);

            if ($ejecutar) {
                echo "<script>
                Swal.fire({
                    title: '¡Gracias!',
                    text: 'Tu solicitud se ha registrado correctamente.',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    // Redirigimos al usuario después de que cierre la alerta
                    if (result.isConfirmed) {
                        window.location.href = '" . getUrl("Solicitud", "Solicitud", "GetCreateVia") . "';
                    }
                });
            </script>";
            } else {
                echo "Se ha presentado un error al insertar";
            }
        } else {
            redirect(getUrl("Solicitud", "Solicitud", "getCreateAccidente"));
        }






        if ($ejecutar) {


        } else {
            echo "Se ha presentado un error al insertar";


        }


    }
    //Termina accidentes
}
?>