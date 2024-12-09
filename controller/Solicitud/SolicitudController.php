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
            include_once '../view/solicitudSenal/malEstado/create.php';
        } else if ($id_solicitud == 2) {
            include_once '../view/solicitudVial/create.php';
        } else if ($id_solicitud == 4) {
            redirect(getUrl("Solicitud", "Solicitud", "getCreateAccidente"));
        }
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

        include_once '../view/solicitudSenal/malEstado/create.php';
    }
    public function postCreateSenialMalEstado()
    {

        $obj = new SolicitudModel();

        // $senal_id=$_POST['senal_id'];
        $categoria = $_POST['categoria_senal_id'];
        $categoria_senal_id = $_POST['categoria_senal_id'];
        $tipo_senal_id = $_POST['tipo_senal_id'];
        $senial_id = $_POST['senial_id'];
        $solicitud_senial_mal_estado_descripcion = $_POST['solicitud_senial_mal_estado_descripcion'];
        $solicitud_senial_mal_estado_direccion = $_POST['solicitud_senial_mal_estado_direccion'];
        $solicitud_senial_mal_estado_imagen = $_POST['solicitud_senial_mal_estado_imagen'];
        $danio_id = $_POST['danio_id'];
        $usuario_id = 1;

        $sql = "INSERT INTO usuarios VALUES(null,$senial_id,$solicitud_senial_mal_estado_descripcion,$danio_id,$usuario_id,$solicitud_senial_mal_estado_direccion,$solicitud_senial_mal_estado_imagen,1,1)";
        $ejecutar = $obj->insert($sql);
        if ($ejecutar) {
            redirect(getUrl("Solicitud", "Solicitud", "getSenialMalEstado"));
        } else {
            echo "Se ha presentado un error al insertar";
        }



        $categoria_reduc_id = $_POST[''];
        $categoria_reduc_nombre = $_POST[''];
        $tipo_reduc_id = $_POST[''];

        $sql = "INSERT INTO  VALUES()";
        $ejecutar = $obj->insert($sql);
        if ($ejecutar) {
            redirect(getUrl("Solicitud", "Solicitud", ""));
        } else {
            echo "Se ha presentado un error al insertar";
        }


    }






    //Empieza reductor
    public function GetCreateReductor()
    {
        $obj = new SolicitudModel();

        $sql = "SELECT r.*, t_r.tipo_reductor_nombre FROM reductor r, tipo_señal t_r WHERE r.tipo_reductor_id=t_r.tipo_reductor_id ";

        $reductor = $obj->consult($sql);

        include_once '../view/solicitudReductor/consult.php';


    }
    public function PostCreateReductor()
    {
        $obj = new SolicitudModel();

        $categoria_reduc_id = $_POST[''];
        $categoria_reduc_nombre = $_POST[''];
        $tipo_reduc_id = $_POST[''];

        $sql = "INSERT INTO  VALUES()";
        $ejecutar = $obj->insert($sql);
        if ($ejecutar) {
            redirect(getUrl("Solicitud", "Solicitud", "GetCreateReductor"));
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

        $sql = "INSERT INTO solicitud_vias_mal_estado (solicitud_via_mal_estado_descripcion, danio_id, usuario_id, 
        solicitud_via_mal_estado_direccion, solicitud_via_mal_estado_imagen, tipo_solicitud_id, estado_id) VALUES(
       '$descripcion',  $danio,  1, '$direccion', '$imagen', 5, 1)";

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






        if ($ejecutar) {


        } else {
            echo "Se ha presentado un error al insertar";


        }


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

        $sql = "SELECT * FROM barrios LIMIT 10";
        $barrios = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM letras_via LIMIT 10";
        $letras = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM tipo_via";
        $vias = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM orientaciones";
        $orientaciones = pg_fetch_all($obj->consult($sql));
        

        include_once '../view/solicitudAccidente/create.php';


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
        solicitud_accidente_imagen,solicitud_accidente_descripcion,estado_id,usuario_id,tipo_solicitud_id) VALUES (
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
            redirect(getUrl("Usuarios", "Usuarios", "getCreate"));
        }






        if ($ejecutar) {


        } else {
            echo "Se ha presentado un error al insertar";


        }


    }
    //Termina accidentes
}
?>