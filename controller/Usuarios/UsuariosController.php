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

        $usu_direccion = $_POST['usuario_direccion'];


        $validaciones = true;

        $campos = [

            ' usu_nombre_1' => 'El campo primer nombre es requerido',
            'usu_nombre_2' => 'El campo nombre es requerido',
            'usu_apellido_1' => 'El campo nombre es requerido',
            'usu_apellido_2' => 'El campo nombre es requerido',
            'usu_correo' => 'El campo nombre es requerido',
            'usu_contrasenia' => 'El campo nombre es requerido',
            'usu_telefono' => 'El campo telefono es requerido',
            'tipo_documento' => 'El campo nombre es requerido',
            'numero_documento' => 'El campo nombre es requerido',
            'usu_direccion' => 'El campo nombre es requerido'
        ];

        // Bucle para validar los campos
        foreach ($campos as $campo => $mensaje) {
            if (empty($$campo)) {  // Se usa $$campo para acceder dinámicamente a la variable

                $_SESSION['errores'][] = $mensaje;
                $validacion = false;
            }

        }

        // // $id= $obj->autoIncrement("usu_id","usuarios");
        // $usu_clave=password_hash($usu_clave,PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (tipo_documento_id, usuario_num_identificacion, usuario_nombre_1,
         usuario_nombre_2, usuario_apellido_1, usuario_apellido_2, usuario_contrasenia, usuario_correo,
          usuario_telefono, usuario_direccion, rol_id, estado_id) VALUES ($tipo_documento, $numero_documento, 
          '$usu_nombre_1', '$usu_nombre_2', '$usu_apellido_1', '$usu_apellido_2', '$usu_contrasenia', '$usu_correo',
           $usu_telefono, '$usu_direccion', 2, 1)";

        echo $sql;

        if ($validaciones == true) {
            $ejecutar = $obj->insert($sql);
            if ($ejecutar) {
                if (isset($_POST['registro'])) {
                    $_SESSION['auth'] = 'ok';
                    redirect('../web/index.php');
                } else {
                    redirect(getUrl("Usuarios", "Usuarios", "getUsuarios"));
                }
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
            $usu_contrasena = $_POST['usuario_contrasena'];
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
        if (!empty($usu_contrasena)) {
            $campos[] = "usuario_contrasena='$usu_contrasena'";
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
