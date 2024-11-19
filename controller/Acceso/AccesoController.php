<?php
include_once '../model/Acceso/AccesoModel.php';
include_once '../model/Usuarios/UsuariosModel.php';
    class AccesoController{
        public function login(){
            $obj = new UsuariosModel();

            $user=$_POST['user'];
            $pass=$_POST['pass'];

            $sql = "SELECT * FROM usuarios WHERE usu_email='$user'";
            $usuarios= $obj->consult($sql);

            if(mysqli_num_rows($usuarios)>0){
                foreach($usuarios as $usu){
                    if(password_verify($pass,$usu['usu_clave'])){
                        $_SESSION['nombre']=$usu['usu_nombre'];
                        $_SESSION['apellido']=$usu['usu_apellido'];
                        $_SESSION['correo']=$usu['usu_email'];
                        
                        $_SESSION['auth']='ok';
                        redirect('../web/index.php');
                        
                    }else{
                        $_SESSION['error']="El correo y/o Contraseña no se encuentran";
                        redirect('login.php');
                    }
                }
            }else{
                $_SESSION['error']="El correo y/o Contraseña no se encuentran";
                redirect('login.php');
            }
            
        }
        public function logut(){
            session_destroy();
            redirect ('../web/login.php');
        }
    }

?>