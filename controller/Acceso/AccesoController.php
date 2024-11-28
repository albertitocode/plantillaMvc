<?php
include_once '../model/Acceso/AccesoModel.php';
include_once '../model/Usuarios/UsuariosModel.php';

class AccesoController {

        public function login(){
            $obj = new UsuariosModel();

            $user=$_POST['user'];
            $pass=$_POST['pass'];

            $sql = "SELECT * FROM usuarios WHERE usuario_correo='$user'";
            $usuarios= $obj->consult($sql);
            if($usuarios){
            if(pg_num_rows($usuarios)>0){
                $usuarios = pg_fetch_all($usuarios);
                foreach($usuarios as $usu){
                    // if(password_verify($pass,$usu['usu_clave'])){
                        $_SESSION['nombre']=$usu['usuario_nombre_1'];
                        $_SESSION['apellido']=$usu['usuario_apellido_1'];
                        $_SESSION['correo']=$usu['usuario_correo'];
                        $_SESSION['rol']=$usu['rol_id'];
                        $_SESSION['usuario_id']=$usu['usuario_id'];
                        
                        $_SESSION['auth']='ok';
                        
                        redirect('../web/index.php');
                        
                } 
                }else{
                    $_SESSION['error']="El correo y/o Contraseña no se encuentran";
                   // redirect('login.php');
                }
            }else{
                $_SESSION['error']="El correo y/o Contraseña no se encuentran";
                //redirect('login.php');
            }
            
        }

    public function logout() {
        session_destroy();
        redirect('login.php');
    }
}
?>