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
        public function GetCreateSenal(){
            $obj = new SolicitudModel();

            $sql = "SELECT * FROM categoria_senal";
            $categoria_senal=$obj->consult($sql);

            $sql = "SELECT * FROM tipo_senal";
            $tipo_senal=$obj->consult($sql);

            include_once '../view/solicitudSenal/create.php';
        }
        public function postCreateSenal(){

            $obj=new SolicitudModel();

            $senal_id=$_POST['senal_id'];
            $senal_nombre=$_POST['senal_nombre'];
            $categoria_senal_id=$_POST['categoria_senal_id'];
            $tipo_senal_id=$_POST['tipo_senal_id'];

            $sql="INSERT INTO usuarios VALUES($senal_id,'$senal_nombre',$categoria_senal_id,$tipo_senal_id)";
            $ejecutar=$obj->insert($sql);
                if($ejecutar){
                    redirect(getUrl("Solicitud","Solicitud","getSenal"));
                }else{
                    echo "Se ha presentado un error al insertar";
                }
            


        }
        public function getSenal(){
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