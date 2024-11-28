<?php
    include_once '../model/Solicitud/SolicitudModel.php';

    class SolicitudController {
        public function test1() {
            echo "Funciona1";
        }
        public function test2() {
            echo "Funciona2";
        }
        public function test3() {
            echo "Funciona3";
        }
        public function getCreateSenialMalEstado(){
            $obj = new SolicitudModel();

            $sql = "SELECT * FROM categoria_senal";
            $categoria_senal=$obj->consult($sql);

            $sql = "SELECT * FROM tipo_senal";
            $tipo_senal=$obj->consult($sql);

            include_once '../view/solicitudSenal/malEstado/create.php';
        }
        public function postCreateSenialMalEstado(){

            $obj=new SolicitudModel();

            // $senal_id=$_POST['senal_id'];
            $categoria=$_POST['categoria_senal_id'];
            $categoria_senal_id=$_POST['categoria_senal_id'];
            $tipo_senal_id=$_POST['tipo_senal_id'];
            $senial_id=$_POST['senial_id'];
            $solicitud_senial_mal_estado_descripcion=$_POST['solicitud_senial_mal_estado_descripcion'];
            $solicitud_senial_mal_estado_direccion=$_POST['solicitud_senial_mal_estado_direccion'];
            $solicitud_senial_mal_estado_imagen=$_POST['solicitud_senial_mal_estado_imagen'];
            $danio_id=$_POST['danio_id'];
            $usuario_id=1;

            $sql="INSERT INTO usuarios VALUES(null,$senial_id,$solicitud_senial_mal_estado_descripcion,$danio_id,$usuario_id,$solicitud_senial_mal_estado_direccion,$solicitud_senial_mal_estado_imagen,1,1)";
            $ejecutar=$obj->insert($sql);
                if($ejecutar){
                    redirect(getUrl("Solicitud","Solicitud","getSenialMalEstado"));
                }else{
                    echo "Se ha presentado un error al insertar";
                }
            


        }
        public function getSenialMalEstado(){
            $obj=new SolicitudModel();

            $sql= "SELECT s.*,c.categoria_senal_nombre, t.tipo_senal_nombre FROM senal s, categoria_senal c, tipo_senal t WHERE s.categoria_senal_id =c.categoria_senal_id AND s.tipo_senal_id=t.tipo_senal_id";
            $senal=$obj->consult($sql);
            include_once '../view/solicitudSenal/consult.php';
        }
        public function GetCreateReduc(){
            $obj= new SolicitudModel();

            $sql="SELECT r.*, t_r.tipo_reductor_nombre FROM reductor r, tipo_señal t_r WHERE r.tipo_reductor_id=t_r.tipo_reductor_id ";

            $reductor=$obj->consult($sql);

            include_once '../view/solicitudReductor/consult.php';


        }
        public function PostCreateReduc(){
            $obj=new SolicitudModel();

            $categoria_reduc_id=$_POST[''];
            $categoria_reduc_nombre=$_POST[''];
            $tipo_reduc_id=$_POST[''];

            $sql="INSERT INTO  VALUES()";
            $ejecutar=$obj->insert($sql);
                if($ejecutar){
                    redirect(getUrl("Solicitud","Solicitud",""));
                }else{
                    echo "Se ha presentado un error al insertar";
                }
           
        
        }
        public function GetCreateVia(){

        
        }
        public function PostCreateVia(){

        }
    

    }
?>