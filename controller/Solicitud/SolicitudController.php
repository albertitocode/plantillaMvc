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
            redirect(getUrl("Solicitud", "Solicitud", "getSenialMalEstado"));
        } else if ($id_solicitud == 2) {
            // include_once '../view/solicitudVial/create.php';
            redirect(getUrl("Solicitud", "Solicitud", "getVias"));
        } else if ($id_solicitud == 4) {
            redirect(getUrl("Solicitud", "Solicitud", "getAccidente"));
        } else if ($id_solicitud == 5) {
            redirect(getUrl("Solicitud", "Solicitud", "getSenialNueva"));
        } else if ($id_solicitud == 3) {
            redirect(getUrl("Solicitud", "Solicitud", "getReductorMalEstado"));
        } else if ($id_solicitud == 6) {
            redirect(getUrl("Solicitud", "Solicitud", "getReductorNuevo"));
        }



    }

//Empieza señales
    //Empieza señales nuevas

    public function getSenialNueva(){

        $obj = new SolicitudModel();

        $sql = "SELECT s.*, se.senial_nombre, usu.usuario_nombre_1, usu.usuario_apellido_1, usu.usuario_telefono, tip.tipo_solicitud_nombre, e.estado_nombre FROM solicitud_seniales_nuevas s JOIN seniales se ON s.senial_id=se.senial_id JOIN usuarios usu  ON s.usuario_id=usu.usuario_id JOIN tipo_solicitudes tip ON s.tipo_solicitud_id = tip.tipo_solicitud_id JOIN estados e ON s.estado_id = e.estado_id";
        $solicitud_seniales_nuevas = pg_fetch_all($obj->consult($sql));

        include_once '../view/solicitudSenal/nueva/consult.php';
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

        include_once '../view/solicitudSenal/nueva/create.php';
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

        //validaciones 
        $validacion= true;
        $campos = [
            'categoria_senal_id' => 'Es requerido llenar el campo categoria',
            'tipo_senal_id' => 'Es requerido llenar el campo tipo de señal', //todos llegan menos este, revisar
            'senial_id' => 'Es requerido llenar el campo señal',
            'solicitud_senial_nueva_descripcion' => 'Es requerido llenar el campo observacion'
            

        ];

        foreach ($campos as $campo =>$mensaje){
            if (empty(trim($$campo))) {  

                $_SESSION['errores'][] = $mensaje;
                $validacion = false;
            }else{

            }
        }
        

        
        $sql = "INSERT INTO solicitud_seniales_nuevas (solicitud_senial_nueva_descripcion,solicitud_senial_nueva_direccion,senial_id,usuario_id,tipo_solicitud_id,estado_id) VALUES('$solicitud_senial_nueva_descripcion','$solicitud_senial_nueva_direccion',$senial_id,$usuario_id,5,1)";
        if($validacion == true){
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
                        window.location.href = '" . getUrl("Solicitud", "Solicitud", "getCreateNuevaSenial") . "';
                    }
                });
            </script>";
            } else {
                echo "Se ha presentado un error al insertar";
            }
        }else{
            redirect(getUrl("Solicitud", "Solicitud", "getCreateNuevaSenial"));
        }


    }
    //Termina señales nuevas

    //Empieza Señal en mal estado
    public function getSenialMalEstado(){

        $obj = new SolicitudModel();

        $sql = "SELECT s.*, se.senial_nombre, usu.usuario_nombre_1, usu.usuario_apellido_1, usu.usuario_telefono, da.danio_nombre, tip.tipo_solicitud_nombre, e.estado_nombre FROM solicitud_seniales_mal_estado s JOIN seniales se ON s.senial_id=se.senial_id JOIN usuarios usu  ON s.usuario_id=usu.usuario_id JOIN tipo_solicitudes tip ON s.tipo_solicitud_id = tip.tipo_solicitud_id JOIN estados e ON s.estado_id = e.estado_id JOIN danios da ON s.danio_id=da.danio_id";
        $solicitud_seniales_mal_estado = pg_fetch_all($obj->consult($sql));

        include_once '../view/solicitudSenal/malEstado/consult.php';
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
        // $categoria = $_POST['categoria_senal_id'];
        $categoria_senal_id = $_POST['categoria_senal_id'];
        $tipo_senal_id = $_POST['tipo_senal_id'];
        $senial_id = $_POST['senial_id'];
        $solicitud_senial_mal_estado_descripcion = $_POST['solicitud_senial_mal_estado_descripcion'];
        $solicitud_senial_mal_estado_direccion = $_POST['solicitud_senial_mal_estado_direccion'];
        $solicitud_senial_mal_estado_imagen = $_POST['solicitud_senial_mal_estado_imagen'];
        $danio_id = $_POST['danio_id'];
        $usuario_id = $_SESSION['id'];


         //validaciones 
         $validacion= true;
         $campos = [
             'categoria_senal_id' => 'Es requerido llenar el campo categoria',
             'tipo_senal_id' => 'Es requerido llenar el campo tipo de señal',
             'senial_id' => 'Es requerido llenar el campo señal',
             'solicitud_senial_nueva_descripcion' => 'Es requerido llenar el campo observacion',
             'solicitud_senial_nueva_direccion' => 'Es requerido llenar el campo Direccion',
             'danio_id' => 'Es requerido llenar el campo daño'
         ];
 
         foreach ($campos as $campo =>$mensaje){
            if (empty(trim($$campo))) {  

                $_SESSION['errores'][] = $mensaje;
                $validacion = false;
            }else{
             }
         }
        $sql = "INSERT INTO solicitud_seniales_mal_estado (senial_id,solicitud_senial_mal_estado_descripcion,danio_id,usuario_id,solicitud_senial_mal_estado_direccion,solicitud_senial_mal_estado_imagen,tipo_solicitud_id,estado_id) VALUES($senial_id,'$solicitud_senial_mal_estado_descripcion',$danio_id,$usuario_id,'$solicitud_senial_mal_estado_direccion','$solicitud_senial_mal_estado_imagen',1,1)";
        if ($validacion == true){
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
                        window.location.href = '" . getUrl("Solicitud", "Solicitud", "getSolicitud") . "';
                    }
                });
            </script>";
            } else {
                echo "Se ha presentado un error al insertar";
            }
        }else{
            redirect(getUrl("Solicitud", "Solicitud", "getCreateSenialMalEstado"));
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



    //termina señales en mal estado
//termina señales

//Empieza reductor
    //Empieza reductores en mal estado
    public function getReductorMalEstado(){

        $obj = new SolicitudModel();

        $sql = "SELECT r.*, re.reductor_nombre, usu.usuario_nombre_1, usu.usuario_apellido_1, usu.usuario_telefono, da.danio_nombre, tip.tipo_solicitud_nombre, e.estado_nombre FROM solicitud_reductores_mal_estado r JOIN reductores re ON r.reductor_id=re.reductor_id JOIN usuarios usu  ON r.usuario_id=usu.usuario_id JOIN tipo_solicitudes tip ON r.tipo_solicitud_id = tip.tipo_solicitud_id JOIN estados e ON r.estado_id = e.estado_id JOIN danios da ON r.danio_id=da.danio_id";
        $solicitud_reductores_mal_estado = pg_fetch_all($obj->consult($sql));

        include_once '../view/solicitudReductor/malEstado/consult.php';
    }
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
        $categoria = $_POST['categoria_reductor_id'];

        $validacion = true;
        $campos = [
            'solicitud_reductores_mal_estado_descripcion' => 'El campo Descripcion es requerido',
            'danio_id' => 'El campo daño es requerido',
            'barrio' => 'El campo barrio es requerido',
            'calle' => 'El campo calle es requerido',
            'carrera' => 'El campo carrera es requerido',
            'reductor_id' => 'El campo reductor es requerido',
            'categoria_reductor_id' => 'El campo categoria es requerido'

        ];

        
        foreach ($campos as $campo => $mensaje) {
            if (empty(trim($$campo))) {  

                $_SESSION['errores'][] = $mensaje;
                $validacion = false;
            }

        }
        // if(validarCampoLetras($usu_nombre)==false){
        //     $_SESSION['errores'][]="El campo nombre debe contener solo letras";
        //         $validaciones= false;
        //     }

        $sql = "INSERT INTO solicitud_reductores_mal_estado (solicitud_reductores_mal_estado_descripcion,solicitud_reductores_mal_estado_direccion,solicitud_reductores_mal_estado_imagen,reductor_id,danio_id,usuario_id,tipo_solicitud_id,estado_id) VALUES('$solicitud_reductores_mal_estado_descripcion','$direccion','$solicitud_reductores_mal_estado_imagen',$reductor_id,$danio_id,$usuario_id,3,1)";
        // var_dump($sql);

        if($validacion == true){
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
                        window.location.href = '" . getUrl("Solicitud", "Solicitud", "getSolicitud") . "';
                    }
                });
            </script>";
            } else {
                echo "Se ha presentado un error al insertar";
            }
        }else{
            redirect(getUrl("Solicitud", "Solicitud", "getCreateReductorMalEstado"));
        }
        
        



    }
    //Termina reductores en mal estado
    
    //Empieza nuevos reductores


    public function getReductorNuevo(){

        $obj = new SolicitudModel();

        $sql = "SELECT r.*, re.reductor_nombre, usu.usuario_nombre_1, usu.usuario_apellido_1, usu.usuario_telefono, tip.tipo_solicitud_nombre, e.estado_nombre FROM solicitud_reductores_nuevos r JOIN reductores re ON r.reductor_id=re.reductor_id JOIN usuarios usu  ON r.usuario_id=usu.usuario_id JOIN tipo_solicitudes tip ON r.tipo_solicitud_id = tip.tipo_solicitud_id JOIN estados e ON r.estado_id = e.estado_id";
        $solicitud_reductores_nuevos = pg_fetch_all($obj->consult($sql));

        include_once '../view/solicitudReductor/nuevo/consult.php';
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
        // var_dump($solicitud_reductor_nuevo_imagen);
        $usuario_id = $_SESSION['id'];
        $reductor_id = $_POST['reductor_id'];

        $validacion = true;
        $campos = [
            'solicitud_reductores_mal_estado_descripcion' => 'El campo Descripcion es requerido',
            'barrio' => 'El campo barrio es requerido',
            'calle' => 'El campo calle es requerido',
            'carrera' => 'El campo carrera es requerido',
            'reductor_id' => 'El campo reductor es requerido',
            'categoria_reductor_id' => 'El campo categoria es requerido'

        ];

        
        foreach ($campos as $campo => $mensaje) {
            if (empty(trim($$campo))) {  

                $_SESSION['errores'][] = $mensaje;
                $validacion = false;
            }

        }
        $sql = "INSERT INTO solicitud_reductores_nuevos(solicitud_reductor_nuevo_descripcion,solicitud_reductor_nuevo_direccion,solicitud_reductor_nuevo_imagen,reductor_id,usuario_id,tipo_solicitud_id,estado_id) VALUES('$solicitud_reductor_nuevo_descripcion','$direccion','$solicitud_reductor_nuevo_imagen',$reductor_id,$usuario_id,6,1)";
        if($validacion == true){
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
                        window.location.href = '" . getUrl("Solicitud", "Solicitud", "getSolicitud") . "';
                    }
                });
            </script>";
            } else {
                echo "Se ha presentado un error al insertar";
            }
        }else{
            redirect(getUrl("Solicitud", "Solicitud", "getCreateReductorNuevo"));
        }


    }
    //Termina nuevos reductores
//Termina Reductor


//Empieza Vias

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
            if (empty(trim($$campo))) {  

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
            redirect(getUrl("Solicitud", "Solicitud", "getCreateVia"));
        }






        // if ($ejecutar) {


        // } else {
        //     echo "Se ha presentado un error al insertar";


        // }


    }

    public function getVias()
    {

        $obj = new SolicitudModel();
        $sql = "SELECT v.*, usu.usuario_nombre_1, usu.usuario_apellido_1, usu.usuario_telefono, da.danio_nombre, tip.tipo_solicitud_nombre, e.estado_nombre FROM solicitud_vias_mal_estado v JOIN usuarios usu  ON v.usuario_id=usu.usuario_id JOIN tipo_solicitudes tip ON v.tipo_solicitud_id = tip.tipo_solicitud_id JOIN estados e ON v.estado_id = e.estado_id JOIN danios da ON v.danio_id=da.danio_id";
        $vias = pg_fetch_all($obj->consult($sql));

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
//Empieza pqrs
    public function GetCreatePQRS()
    {

        $obj = new SolicitudModel();

        $sql = "SELECT * FROM tipo_pqrs";
        $tipo_pqrs = pg_fetch_all($obj->consult($sql));

        

        $sql = "SELECT * FROM estados";
        $estado = pg_fetch_all($obj->consult($sql));

        



        include_once '../view/solicitudPQRS/create.php';


    }

    public function PostCreatePQRS()
    {

        $obj = new SolicitudModel();
        $descripcion = $_POST['descripcion_pqrs'];
        $archivo = $_POST['adjuncion_pqrs'];
        $usuario = $_SESSION['id'];
        $tipo_p = $_POST['tipo_pqrs_id'];

        //VALIDACIONES
         $validacion = true;
         $campos = [
             'tipo_pqrs_id' => 'El campo tipo pqrs es requerido',
             'descripcion_pqrs' => 'El campo descripcion es requerido'
         ];

        // Bucle para validar los campos
        foreach ($campos as $campo => $mensaje) {
            if (empty(trim($$campo))) {  

                $_SESSION['errores'][] = $mensaje;
                $validacion = false;
            }

         }

   

        $sql = "INSERT INTO pqrs ( tipo_pqrs_id, pqrs_descripcion, usuario_id, pqrs_archivo) VALUES(  '$tipo_p','$descripcion', '$usuario', '$archivo')";

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
                        window.location.href = '" . getUrl("Solicitud", "Solicitud", "GetcreatePQRS") . "';
                    }
                });
            </script>";
            } else {
                echo "Se ha presentado un error al insertar";
            }
         } else {
            echo "feo";
         redirect(getUrl("Solicitud", "Solicitud", "GetcreatePQRS"));
         }






        // if ($ejecutar) {


        // } else {
        //     echo "Se ha presentado un error al insertar";


        // }


    }

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
        //echo "si";
        $obj = new SolicitudModel();
        if (isset($_POST['tipo_choque'])) {
            $tipo_choque = $_POST['tipo_choque'];

            $sql = "SELECT * from choque_detalles WHERE tipo_choque_id=$tipo_choque";
            $detalleChoques = $obj->consult($sql);


            $i = 0;
            if (pg_num_rows($detalleChoques)>0) {
                $detalleChoques = pg_fetch_all($detalleChoques);
                foreach ($detalleChoques as $det_choque) {
                    print_r($det_choque);

                    if ($i == 0) {
                        echo "<option value=''>Seleccione...</option>";
                        $i = 1;
                    }

                    echo "<option value='" . $det_choque['choque_detalle_id'] . "'>" . $det_choque['choque_detalle_descripcion'] . "</option>";

                }

            } else {

                echo "error";
            }




        }
    }

    public function PostCreateAccidente()
    {
        $obj = new SolicitudModel();

        $tipo_via = $_POST['tipo_via'];
        $num_via = $_POST['num_via'];
        $letra1 = $_POST['letra1'];

        $orientacion = $_POST['orientacion'];
        $numero2 = $_POST['numero2'];
        $letra2 = $_POST['letra2'];
        $numero3 = $_POST['numero3'];
        $barrio = $_POST['barrio'];

        $descripcion = $_POST['observacion'];
        $imagen = $_POST['imagen'];
        $tipo_choque = $_POST['tipo_choque'];



        if (isset($_POST['lesionados'])) {
            $lesionados = $_POST['lesionados'];
        } else {
            $lesionados = "Sin lesionados";
        }
        echo "les" . $lesionados;
        if (isset($_POST['bis'])) {
            $bis = $_POST['bis'];
        } else {
            $bis = "";
        }

        $direccion = "$tipo_via $num_via$letra1 $bis $orientacion $numero2$letra2 $numero3, barrio $barrio";

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
    '$direccion', $tipo_choque, '$imagen','$descripcion','$lesionados', 3, 1, 4 );";

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
                        window.location.href = '" . getUrl("Solicitud", "Solicitud", "GetCreateAccidente") . "';
                    }
                });
            </script>";
            } else {
                echo "Se ha presentado un error al insertar";
            }
        } else {
            redirect(getUrl("Solicitud", "Solicitud", "getCreateAccidente"));
        }








    }

    public function getAccidentes()
    {

        $obj = new SolicitudModel();

        $sql = "SELECT sa.*, tc.tipo_choque_nombre, e.estado_nombre, tip.tipo_solicitud_nombre , e.estado_nombre,usu.usuario_num_identificacion FROM
          solicitud_accidentes sa JOIN
           tipo_choques tc ON sa.tipo_choque_id=tc.tipo_choque_id JOIN usuarios usu  ON sa.usuario_id=usu.usuario_id JOIN 
          tipo_solicitudes tip ON sa.tipo_solicitud_id = tip.tipo_solicitud_id JOIN 
          estados e ON sa.estado_id = e.estado_id";
        $accidentes = pg_fetch_all($obj->consult($sql));



        // $sql = "SELECT sa.*, tc.tipo_choque_id, e.estado_nombre, u.usuario_num_identificacion FROM solicitud_accidentes sa,
        //  tipo_choques tc, estados e, usuarios u WHERE tc.tipo_choque_id=sa.tipo_choque_id AND e.estado_id=sa.estado_id AND 
        //  u.usuario_id=sa.usuario_id ORDER BY sa.solicitud_accidente_id ASC";
        // //$sql="SELECT*FROM usuario";
        // $accidentes = $obj->consult($sql);

        if ($accidentes) {
            include_once '../view/solicitudAccidente/consult.php';

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
                        window.location.href = '" . getUrl("Solicitud", "Solicitud", "GetCreateAccidente") . "';
                    }
                });
            </script>";

        }

    }
    //Termina accidentes
}
?>