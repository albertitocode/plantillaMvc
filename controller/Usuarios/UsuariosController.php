<?php

include_once '../model/Usuarios/UsuariosModel.php';
class UsuariosController
{
    // public function test(){
    //     echo"Funciona maifren";
    // }


    public function getCreate()
    {
        $obj = new UsuariosModel();

        $sql = "SELECT * FROM barrios";
        $barrios = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM letras_via";
        $letras = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM tipo_via";
        $vias = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM orientaciones";
        $orientaciones = pg_fetch_all($obj->consult($sql));


        $sql = "SELECT * FROM roles";
        $roles = pg_fetch_all($obj->consult($sql));


        $sql = "SELECT * FROM tipo_documentos";
        $tipo_documento = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM estados";
        $estado = pg_fetch_all($obj->consult($sql));


        if (isset($_POST['registro'])) {
            include_once '../view/usuarios/newUser.php';
        } else {
            include_once '../view/usuarios/create.php';
        }
    }
    public function postCreate()
    {

        $obj = new UsuariosModel();
        $usu_nombre_1 = $_POST['usuario_nombre_1'];
        $usu_nombre_2 = $_POST['usuario_nombre_2'];
        $usu_apellido_1 = $_POST['usuario_apellido_1'];
        $usu_apellido_2 = $_POST['usuario_apellido_2'];
        $usu_correo = $_POST['usuario_correo'];
        $usu_contrasenia = $_POST['usuario_contrasenia'];
        // $rol=$_POST['rol'];
        $usu_telefono = $_POST['usuario_telefono'];
        $tipo_documento = $_POST['tipo_documento_id'];
        $numero_documento = $_POST['usuario_num_identificacion'];
        $usu_fecha_nac = $_POST['usuario_fecha_nacimiento'];
        $tipo_via = $_POST['tipo_via'];
        $num_via = $_POST['num_via'];
        $letra1 = $_POST['letra1'];

        $orientacion = $_POST['orientacion'];
        $numero2 = $_POST['numero2'];
        $letra2 = $_POST['letra2'];
        $numero3 = $_POST['numero3'];
        $barrio = $_POST['barrio'];


        if (isset($_POST['rol'])) {

            $rol = $_POST['rol'];
        } else {
            $rol = 3;
        }

        if (isset($_POST['bis'])) {
            $bis = $_POST['bis'];
        } else {
            $bis = "";
        }
        $direccion = "$tipo_via $num_via$letra1 $bis $orientacion #$numero2$letra2-$numero3, barrio $barrio";


        $validacion = true;

        $campos = [

            'usuario_nombre_1' => 'Primer nombre requerido',
            'usuario_apellido_1' => 'Primer apellido requerido',
            'usuario_correo' => 'Correo electrónico requerido',
            'usuario_apellido_2' => 'Segundo apellido requerido',
            'usuario_fecha_nacimiento' => 'Fecha de nacimiento requerido',
            'usuario_telefono' => 'Teléfono requerido',
            'tipo_documento_id' => 'Tipo de documento requerido',
            'usuario_num_identificacion' => 'Número de documento requerido',
            'tipo_via' => "Tipo de vía requerido",
            'num_via' => "Número de vía requerido",
            'orientacion' => "Orientación requerido",
            'numero2' => "Número complemento 2 requerido",
            'numero3' => "Número complemento 3 requerido",
            'barrio' => "Barrio requerido",
            'usuario_contrasenia' => 'Contraseña requerido',
            'rol' => 'Rol requerido'
        ];

        foreach ($campos as $campo => $mensaje) {
            if (empty($_POST[$campo])) {
                $_SESSION['errores'][] = $mensaje; // Guardamos el error en sesión
                $validacion = false; // Marcamos que la validación falló
            }
        }



        // // $id= $obj->autoIncrement("usu_id","usuarios");
        $usu_clave = password_hash($usu_contrasenia, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (tipo_documento_id, usuario_num_identificacion, usuario_nombre_1,
         usuario_nombre_2, usuario_apellido_1, usuario_apellido_2,usuario_fecha_nacimiento, usuario_contrasenia, usuario_correo,
          usuario_telefono, usuario_direccion, rol_id, estado_id) VALUES ($tipo_documento, $numero_documento, 
          '$usu_nombre_1', '$usu_nombre_2', '$usu_apellido_1', '$usu_apellido_2','$usu_fecha_nac', '$usu_clave', '$usu_correo',
           $usu_telefono, '$direccion', $rol, 1)";
        var_dump($sql);
        if ($validacion) {
            $ejecutar = $obj->insert($sql);
            if ($ejecutar) {
                echo "<script>
                Swal.fire({
                    title: '¡Felicidades!',
                    text: 'El usuario ha sido registrado exitosamente',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    // Redirigimos al usuario después de que cierre la alerta
                    if (result.isConfirmed) {
                        window.location.href = '" . getUrl("Usuarios", "Usuarios", "getUsuarios") . "';
                    }
                });
            </script>";
            } else {
                echo "Se ha presentado un error al insertar";
            }
        } else {
            redirect(getUrl("Usuarios", "Usuarios", "getCreate"));
        }
    }

    public function getUsuarios()
    {
        $obj = new UsuariosModel();


        $sql = "SELECT u.*,r.rol_nombre, t.tipo_documento_nombre, e.estado_nombre FROM usuarios u JOIN roles r ON u.rol_id =r.rol_id  JOIN tipo_documentos t ON u.tipo_documento_id=t.tipo_documento_id JOIN estados e ON u.estado_id=e.estado_id order by u.usuario_id asc";
        $usuarios = pg_fetch_all($obj->consult($sql));
        include_once '../view/usuarios/consult.php';
    }

    public function buscar()
    {
        $obj = new UsuariosModel();

        $buscar = $_POST['buscar'];

        $sql = "SELECT u.*,r.rol_nombre, t.tipo_documento_nombre FROM usuarios u, rol r, tipo_documento t WHERE u.rol_id =r.rol_id AND u.tipo_documento=t.tipo_documento_id AND (u.usu_nombre_1 LIKE '%$buscar%' OR u.usu_nombre_2 LIKE '%$buscar%' OR u.usu_apellido_1 LIKE '%$buscar%' OR u.usu_apellido_2 LIKE '%$buscar%' OR u.usu_correo LIKE '%$buscar%' OR t.tipo_documento_nombre LIKE '%$buscar%' OR r.rol_nombre LIKE '%$buscar%') ORDER BY u.usu_id ASC";

        $usuarios = pg_fetch_all($obj->consult($sql));

        include_once '../view/usuarios/buscar.php';
    }
    public function buscarUsuario()
    {
        $obj = new UsuariosModel();

        $id_datos = $_POST['id_data'];

        $sql = "SELECT u.*,r.rol_nombre, t.tipo_documento_nombre FROM usuarios u, roles r, tipo_documentos t WHERE u.rol_id =r.rol_id AND u.tipo_documento_id=t.tipo_documento_id AND u.usuario_id=$id_datos";
        $_SESSION['id_datos'] = $id_datos;
        $usuario = pg_fetch_all($obj->consult($sql));

        include_once '../view/usuarios/buscarUsuarios.php';
    }

    public function posUpdateStatus()
    {
        $obj = new UsuariosModel();


        $user = $_POST['user'];
        $estado = $_POST['id'];

        $StatusModify = $estado;

        if ($estado == 1) {
            $StatusModify = 2;
        } else if ($estado == 2) {
            $StatusModify = 1;
        }


        $sql = "UPDATE usuarios SET estado_id=$StatusModify WHERE usuario_id=$user";

        $ejecutar = $obj->update($sql);
        if ($ejecutar) {

            $sql = "SELECT u.*,r.rol_nombre, t.tipo_documento_nombre, e.estado_nombre FROM usuarios u JOIN roles r ON u.rol_id =r.rol_id  JOIN tipo_documentos t ON u.tipo_documento_id=t.tipo_documento_id JOIN estados e ON u.estado_id=e.estado_id order by u.usuario_id asc";
            $usuarios = pg_fetch_all($obj->consult($sql));

            include_once '../view/usuarios/buscar.php';
        } else {
            echo "No se pudo actualizar";
        }
    }
    public function getPerfilAdmin()
    {
        $obj = new UsuariosModel();


        $sql = "SELECT * FROM roles";
        $roles = pg_fetch_all($obj->consult($sql));


        $sql = "SELECT * FROM tipo_documentos";
        $tipo_documento = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM estados";
        $estado = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM usuarios";
        $usuario = pg_fetch_all($obj->consult($sql));

        include_once '../view/usuarios/perfil.php';
    }
    public function getUpdateUsuarios()
    {
        $obj = new UsuariosModel();


        $sql = "SELECT * FROM roles";
        $roles = pg_fetch_all($obj->consult($sql));


        $sql = "SELECT * FROM tipo_documentos";
        $tipo_documento = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM estados";
        $estado = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM usuarios";
        $usuario = pg_fetch_all($obj->consult($sql));

        if ($_SESSION['rol'] == 1) {
            include_once '../view/usuarios/update.php';
        } else {
            include_once '../view/usuarios/perfil.php';
        }
    }
    public function postUpdateUsuarios()
    {

        $obj = new UsuariosModel();
        // dd($_POST);
        if (isset($_POST['enviar'])) {


            $id = $_SESSION['id_datos'];
            $usu_nombre_1 = $_POST['usuario_nombre_1'];
            $usu_nombre_2 = $_POST['usuario_nombre_2'];
            $usu_apellido_1 = $_POST['usuario_apellido_1'];
            $usu_apellido_2 = $_POST['usuario_apellido_2'];
            $usu_correo = $_POST['usuario_correo'];
            $usu_contrasenia = $_POST['usuario_contrasenia'];
            $rol = $_POST['rol_id'];
            $usu_telefono = $_POST['usuario_telefono'];
            $tipo_documento = $_POST['tipo_documento_id'];
            $numero_documento = $_POST['usuario_num_identificacion'];

            $usu_direccion = $_POST['usuario_direccion'];
        }

        $validaciones = true;
        $cont = 0;
        // if (empty($id)) {
        //     $_SESSION['errores'][] = "El campo id es requerido";
        //     $validaciones = false;
        // }

        if (!empty($usu_nombre_1)) {
            $campos[] = "usuario_nombre_1='$usu_nombre_1'";
            $cont = $cont + 1;
        }
        if (!empty($usu_nombre_2)) {
            $campos[] = "usuario_nombre_2='$usu_nombre_2'";
            $cont = $cont + 1;
        }
        if (!empty($usu_apellido_1)) {
            $campos[] = "usuario_apellido_1='$usu_apellido_1'";
            $cont = $cont + 1;
        }
        if (!empty($usu_apellido_2)) {
            $campos[] = "usuario_apellido_2='$usu_apellido_2'";
            $cont = $cont + 1;
        }
        if (!empty($usu_correo)) {
            $campos[] = "usuario_correo='$usu_correo'";
            $cont = $cont + 1;
        }
        if (!empty($usu_contrasenia)) {
            $campos[] = "usuario_contrasenia='$usu_contrasenia'";
            $cont = $cont + 1;
        }
        if (!empty($rol)) {
            $campos[] = "rol_id='$rol'";
            $cont = $cont + 1;
        }
        if (!empty($usu_telefono)) {
            $campos[] = "usuario_telefono=$usu_telefono";
            $cont = $cont + 1;
        }
        if (!empty($tipo_documento)) {
            $campos[] = "tipo_documento_id=$tipo_documento";
            $cont = $cont + 1;
        }
        if (!empty($numero_documento)) {
            $campos[] = "usuario_num_identificacion=$numero_documento";
            $cont = $cont + 1;
        }
        if (!empty($usu_direccion)) {
            $campos[] = "usuario_direccion='$usu_direccion'";
            $cont = $cont + 1;
        }

        if ($cont > 0) {
            $sql = "UPDATE usuarios SET " . implode(", ", $campos) . " WHERE usuario_id=$id";
        } else {
            echo "No se seleccionarion campos para actualizar";
        }
        echo $cont;


        if ($validaciones == true) {
            $ejecutar = $obj->update($sql);
            if ($ejecutar) {
                echo "se insertó correctamente";
                redirect(getUrl("Usuarios", "Usuarios", "getUpdateUsuarios"));
            } else {
                echo "Se ha presentado un error al insertar";
            }
        } else {
            redirect(getUrl("Usuarios", "Usuarios", "getUpdateUsuarios"));
        }
    }
    public function updateStatus()
    {
        $obj = new UsuariosModel();

        // $id=$_POST['usuario_id'];

        $sql = "SELECT u.estado_id,u.usuario_id,u.usuario_nombre_1,u.usuario_num_identificacion,u.usuario_apellido_1,u.usuario_correo,r.rol_nombre, e.estado_nombre FROM usuarios u JOIN roles r ON u.rol_id =r.rol_id   JOIN estados e ON u.estado_id=e.estado_id";
        $usuarios = pg_fetch_all($obj->consult($sql));

        include_once '../view/usuarios/buscar.php';
    }


}
