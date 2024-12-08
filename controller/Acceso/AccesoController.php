<?php
include_once '../model/Acceso/AccesoModel.php';
include_once '../model/Usuarios/UsuariosModel.php';

class AccesoController {

        public function login(){
            $obj = new UsuariosModel();

            $user=$_POST['user'];
            $pass=$_POST['pass'];

            $sql = "SELECT * FROM usuarios WHERE usuario_correo='$user' AND usuario_contrasenia='$pass'";
            $usuarios= $obj->consult($sql);
            if($usuarios){
            if(pg_num_rows($usuarios)>0){
                $usuarios = pg_fetch_all($usuarios);
                foreach($usuarios as $usu){
                    // if(password_verify($pass,$usu['usu_clave'])){
                        $_SESSION['id']=$usu['usuario_id'];
                        $_SESSION['primer nombre']=$usu['usuario_nombre_1'];
                        $_SESSION['segundo nombre'] = $usu['usuario_nombre_2'];
                        $_SESSION['primer apellido']=$usu['usuario_apellido_1'];
                        $_SESSION['segundo apellido']=$usu['usuario_apellido_2'];
                        $_SESSION['correo']=$usu['usuario_correo'];
                        $_SESSION['rol']=$usu['rol_id'];
                        // $_SESSION['rol nombre']=$usu['rol_nombre'];
                        $_SESSION['telefono']=$usu['usuario_telefono'];
                        $_SESSION['direccion']=$usu['usuario_direccion'];
                        $_SESSION['contrasena']=$usu['usuario_contrasena'];
                        // $_SESSION['tipo_documento_nombre']=$usu['tipo_documento_nombre'];
                        $_SESSION['tipo_documento_id']=$usu['tipo_documento_id'];
                        $_SESSION['numero_documento']=$usu['usuario_num_identificacion'];
                        $_SESSION['foto']=$usu['foto_perfil'];
                        
                        if($usu['estado_id']==2){
                        //     echo "<script>
                        //     swal({
                        //         title: '¡Lo sentimos!',
                        //         text: 'Estas eliminado del sistema',
                        //         icon: 'success',
                        //         Button: 'OK'
                        //     });
                            
                        // </script>";
                        echo "Error";
                        redirect('../web/login.php');
                            
                        }else{
                        $_SESSION['auth']='ok';
                        
                        redirect('../web/index.php');
                        }
                } 
                }else{
                    $_SESSION['error']="El correo y/o Contraseña no se encuentran";
                   redirect('login.php');
                }
            }else{
                $_SESSION['error']="El correo y/o Contraseña no se encuentran";
                redirect('login.php');
            }
            if(isset($_POST['registro'])){
                redirect('../view/usuarios/create.php');
            }
        }

    public function logout() {
        session_destroy();
        redirect('login.php');
    }
}
?>