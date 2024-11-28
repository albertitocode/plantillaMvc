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
        $rol = pg_fetch_all($obj->consult($sql));


        $sql = "SELECT * FROM tipo_documentos";
        $tipo_documento = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM estados";
        $estado = pg_fetch_all($obj->consult($sql));

        include_once '../view/usuarios/create.php';
    }
    public function postCreate()
    {

        $obj = new UsuariosModel();
        $usu_nombre_1 = $_POST['usuario_nombre_1'];
        $usu_nombre_2 = $_POST['usuario_nombre_2'];
        $usu_apellido_1 = $_POST['usuario_apellido_1'];
        $usu_apellido_2 = $_POST['usuario_apellido_2'];
        $usu_correo = $_POST['usuario_correo'];
        $usu_contrasena = $_POST['usuario_contrasena'];
        // $rol=$_POST['rol'];
        $usu_telefono = $_POST['usuario_telefono'];
        $tipo_documento = $_POST['tipo_documento_id'];
        $numero_documento = $_POST['usuario_num_identificacion'];

        $usu_direccion = $_POST['usuario_direccion'];


        $validaciones = true;

        //validaciones

        // if(empty($usu_nombre_1)){
        //     $_SESSION['errores'][]="El campo primer nombre es requerido";
        //     $validaciones = false;
        // }

        // if(empty($usu_apellido_1)){
        //     $_SESSION['errores'][]="El campo primer apellido es requerido";
        //     $validaciones= false;
        // }
        // if(empty($usu_apellido_2)){
        //     $_SESSION['errores'][]="El campo segundo apellido es requerido";
        //     $validaciones= false;
        // }
        // if(empty($usu_correo)){
        //     $_SESSION['errores'][]="El campo correo es requerido";
        //     $validaciones= false;
        // }
        // if(empty($usu_contrasena)){
        //     $_SESSION['errores'][]="El campo contraseña es requerido";
        //     $validaciones= false;
        // }
        // if(empty($rol)){
        //     $_SESSION['errores'][]="El campo rol es requerido";
        //     $validaciones= false;
        // }
        // if(empty($usu_telefono)){
        //     $_SESSION['errores'][]="El campo telefon es requerido";
        //     $validaciones= false;
        // }
        // if(empty($tipo_documento)){
        //     $_SESSION['errores'][]="El campo tipo de documento es requerido";
        //     $validaciones= false;
        // }
        // if(empty($numero_documento)){
        //     $_SESSION['errores'][]="El campo numero de documento es requerido";
        //     $validaciones= false;
        // }

        // if(validarCampoLetras($usu_nombre)==false){
        //     $_SESSION['errores'][]="El campo nombre debe contener solo letras";
        //     $validaciones= false;
        // }
        // if(validarNumeros($usu_id)==false){
        //     $_SESSION['errores'][]="El campo id debe contener solo numeros";
        //     $validaciones= false;
        // }
        // if(validarCorreo($usu_email)==false){
        //     $_SESSION['errores'][]="El campo correo no cumple con los requisitos";
        //     $validaciones= false;
        // }
        // if(validarContraseba($usu_clave)==false){
        //     $_SESSION['errores'][]="El campo contraseña no cumple con los requisitos";
        //     $validaciones= false;
        //}
        // if(validaciones($usu_nombre,$usu_id,$usu_email,$usu_clave)==false){
        //     $_SESSION['errores'][]="funciona";
        //     $validaciones= false;
        // }
        // // $id= $obj->autoIncrement("usu_id","usuarios");
        // $usu_clave=password_hash($usu_clave,PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (tipo_documento_id, usuario_num_identificacion, usuario_nombre_1, usuario_nombre_2, usuario_apellido_1, usuario_apellido_2, usuario_contrasena, usuario_correo, usuario_telefono, usuario_direccion, rol_id, estado_id) VALUES ($tipo_documento, $numero_documento, '$usu_nombre_1', '$usu_nombre_2', '$usu_apellido_1', '$usu_apellido_2', '$usu_contrasena', '$usu_correo', $usu_telefono, '$usu_direccion', 1, 1)";

        echo $sql;

        if ($validaciones == true) {
            $ejecutar = $obj->insert($sql);
            if ($ejecutar) {
                redirect(getUrl("Usuarios", "Usuarios", "getUsuarios"));
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


        $sql = "SELECT u.*,r.rol_nombre, t.tipo_documento_nombre, e.estado_nombre FROM usuarios u JOIN roles r ON u.rol_id =r.rol_id  JOIN tipo_documentos t ON u.tipo_documento_id=t.tipo_documento_id JOIN estados e ON u.estado_id=e.estado_id";
        $usuarios = pg_fetch_all($obj->consult($sql));
        include_once '../view/usuarios/consult.php';
    }
    public function buscar()
    {
        $obj = new UsuariosModel();

        $buscar = $_POST['buscar'];

        $sql = "SELECT u.*,r.rol_nombre, t.tipo_documento_nombre FROM usuarios u, rol r, tipo_documento t WHERE u.rol_id =r.rol_id AND u.tipo_documento=t.tipo_documento_id AND (u.usu_nombre_1 LIKE '%$buscar%' OR u.usu_nombre_2 LIKE '%$buscar%' OR u.usu_apellido_1 LIKE '%$buscar%' OR u.usu_apellido_2 LIKE '%$buscar%' OR u.usu_correo LIKE '%$buscar%' OR t.tipo_documento_nombre LIKE '%$buscar%' OR r.rol_nombre LIKE '%$buscar%') ORDER BY u.usu_id ASC";

        $usuarios = $rol = pg_fetch_all($obj->consult($sql));

        include_once '../view/usuarios/buscar.php';
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

        $sql = "SELECT u.estado_id,u.usuario_id,u.usuario_nombre_1,u.usuario_num_identificacion,u.usuario_apellido_1,u.usuario_correo,r.rol_nombre, e.estado_nombre FROM usuarios u JOIN roles r ON u.rol_id =r.rol_id  JOIN estados e ON u.estado_id=e.estado_id";
        $usuarios = pg_fetch_all($obj->consult($sql));

            include_once '../view/usuarios/buscar2.php';
        } else {
            echo "No se pudo actualizar";
        }
    }
    public function getUpdateUsuarios()
    {
        $obj = new UsuariosModel();


        $sql = "SELECT * FROM roles";
        $rol = $rol = pg_fetch_all($obj->consult($sql));


        $sql = "SELECT * FROM tipo_documentos";
        $tipo_documento = $rol = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM estados";
        $estado = $rol = pg_fetch_all($obj->consult($sql));

    
        include_once '../view/usuarios/update.php';
    }
    public function postUpdateUsuarios()
    {

        $obj = new UsuariosModel();
        // dd($_POST);
        if(isset($_POST['enviar'])){

        $id = $_POST['usuario_id'];
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

        echo $sql;

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

        include_once '../view/usuarios/habilitar_inhabilitar.php';
    }
    public function status(){
        $obj = new UsuariosModel();
        include_once '../view/usuarios/status.php';
    }
    public function buscar2()
    {
        $obj = new UsuariosModel();

        $buscar = $_POST['buscar'];

        $sql = "SELECT u.estado_id,u.usuario_id,u.usuario_nombre_1,u.usuario_num_identificacion,u.usuario_apellido_1,u.usuario_correo,r.rol_nombre, e.estado_nombre FROM usuarios u JOIN roles r ON u.rol_id =r.rol_id   JOIN estados e ON u.estado_id=e.estado_id AND (u.usu_nombre_1 LIKE '%$buscar%' OR u.usu_nombre_2 LIKE '%$buscar%' OR u.usu_apellido_1 LIKE '%$buscar%' OR u.usu_apellido_2 LIKE '%$buscar%' OR u.usu_correo LIKE '%$buscar%' OR t.tipo_documento_nombre LIKE '%$buscar%' OR r.rol_nombre LIKE '%$buscar%') ORDER BY u.usu_id ASC";

        $usuarios = $obj->consult($sql);

        include_once '../view/usuarios/buscar2.php';
    }
}
