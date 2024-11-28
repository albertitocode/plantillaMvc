<?php
include_once '../model/Solicitud/SolicitudModel.php';

class SolicitudController
{
    public function test1()
    {
        echo "Funciona1";
    }
    public function test2()
    {
        echo "Funciona2";
    }
    public function test3()
    {
        echo "Funciona3";
    }
    public function GetCreateSenal()
    {
        $obj = new SolicitudModel();

        $sql = "SELECT * FROM categoria_senal";
        $categoria_senal = $obj->consult($sql);

        $sql = "SELECT * FROM tipo_senal";
        $tipo_senal = $obj->consult($sql);

        include_once '../view/solicitudSenal/create.php';
    }
    public function postCreateSenialMalEstado()
    {

        $obj = new SolicitudModel();

        // $senal_id=$_POST['senal_id'];
        $categoria = $_POST['categoria_senal_id'];
        $categoria_senal_id = $_POST['categoria_senal_id'];
        $tipo_senal_id = $_POST['tipo_senal_id'];

        // $sql = "INSERT INTO usuarios VALUES($senal_id,'$senal_nombre',$categoria_senal_id,$tipo_senal_id)";
        // $ejecutar = $obj->insert($sql);
        // if ($ejecutar) {
        //     redirect(getUrl("Solicitud", "Solicitud", "getSenal"));
        // } else {
        //     echo "Se ha presentado un error al insertar";
        // }



    }
    public function getSenal()
    {
        $obj = new SolicitudModel();

        $sql = "SELECT s.*,c.categoria_senal_nombre, t.tipo_senal_nombre FROM senal s, categoria_senal c, tipo_senal t WHERE s.categoria_senal_id =c.categoria_senal_id AND s.tipo_senal_id=t.tipo_senal_id";
        $senal = $obj->consult($sql);
        include_once '../view/solicitudSenal/consult.php';
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

        $sql = "SELECT * FROM tipo_danios";
        $tipo_danio = $obj->consult($sql);



        include_once '../view/solicitudReductor/create.php';


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
}
?>