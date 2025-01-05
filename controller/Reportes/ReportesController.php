<?php

include_once '../model/Reportes/ReportesModel.php';



class ReportesController{


    public function getReporte(){


        $obj = new ReportesModel();

        $sql = "SELECT * FROM tipo_solicitudes";
        $tipo_solicitudes = pg_fetch_all($obj->consult($sql));

        include_once '../view/reportes/reportes.php';
    }

    public function selectReporte(){


        $obj = new ReportesModel();

        // echo "<script>";
        //         echo "console.log('Si metió')";
        //     echo "</script>";

        $id_solicitud = $_POST['id_reporte'];
        // if(isset($id_solicitud)){
        //     echo "<script>";
        //         echo "console.log('Si metió')";
        //     echo "</script>";

        // }
        

        if ($id_solicitud == 1) {
            // include_once '../view/solicitudSenal/malEstado/create.php';
            redirect(getUrl("Reportes", "Reportes", "getReporteSenialMalEstado"));
        } else if ($id_solicitud == 2) {
            // include_once '../view/solicitudVial/create.php';
            redirect(getUrl("Reportes", "Reportes", "GetReporteVia"));
        } else if ($id_solicitud == 4) {
            redirect(getUrl("Reportes", "Reportes", "getReporteAccidente"));
        } else if ($id_solicitud == 5) {
            redirect(getUrl("Reportes", "Reportes", "getReporteNuevaSenial"));
        } else if ($id_solicitud == 3) {
            redirect(getUrl("Reportes", "Reportes", "getReporteReductorMalEstado"));
        } else if ($id_solicitud == 6) {
            redirect(getUrl("Reportes", "Reportes", "getReporteReductorNuevo"));
        }
    }
    public function getReporteSenialMalEstado()
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

        include_once '../view/reportes/reporteSenialM.php';
    }
    public function getReporteNuevaSenial()
    {
        $obj = new SolicitudModel();

        $sql = "SELECT * FROM categoria_seniales";
        $categoria_senal = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM tipo_seniales";
        $tipo_senal = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT  * FROM seniales";
        $seniales = pg_fetch_all($obj->consult($sql));

        include_once '../view/reportes/reporteSenialN.php';
    }
    public function getReporteReductorMalEstado()
    {
        $obj = new SolicitudModel();

        $sql = "SELECT * FROM categoria_reductores";
        $categoria_reductores = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT  * FROM reductores";
        $reductores = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM danios where tipo_solicitud_id=1";
        $danio = pg_fetch_all($obj->consult($sql));

        include_once '../view/reportes/reporteReductorM.php';


    }
    public function getReporteReductorNuevo()
    {
        $obj = new SolicitudModel();

        $sql = "SELECT * FROM categoria_reductores";
        $categoria_reductores = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT  * FROM reductores";
        $reductores = pg_fetch_all($obj->consult($sql));

        include_once '../view/reportes/reporteReductorN.php';


    }

    public function GetReporteVia()
    {

        $obj = new ReportesModel();

        $sql = "SELECT * FROM tipo_solicitudes";
        $tipo_solicitudes = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM danios WHERE tipo_solicitud_id=2";
        $danios = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM estados";
        $estado = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM tipo_solicitudes";
        $tipo_solicitudes = pg_fetch_all($obj->consult($sql));



        include_once '../view/reportes/reporteVia.php';


    }

    public function GetReporteAccidente()
    {

        $obj = new ReportesModel();

        $sql = "SELECT * FROM tipo_solicitudes";
        $tipo_solicitudes = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM barrios";
        $barrios = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM letras_via";
        $letras = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM tipos_via";
        $vias = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM orientaciones";
        $orientaciones = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM tipo_choques";
        $choques = pg_fetch_all($obj->consult($sql));


        include_once '../view/reportes/reporteAccidentes.php';


    }
    public function postReportes(){
        $obj = new ReportesModel();

        $ho=5;

        $sql = "SELECT COUNT(*) AS totalAcci FROM solicitud_accidentes";
        $totalAcci = pg_fetch_row($obj->consult($sql));
        $Accidente = $totalAcci[0];

        $sql = "SELECT COUNT(*) AS totalSeniM FROM solicitud_seniales_mal_estado";
        $totalSeniM = pg_fetch_row($obj->consult($sql));
        $totalSm = $totalSeniM[0];
        // $totalSM = $totalSeniM['totalSeniM'];

        $sql = "SELECT COUNT(*) AS totalReducM FROM solicitud_reductores_mal_estado";
        $totalReduM = pg_fetch_row($obj->consult($sql));
        $ReductorM = $totalReduM[0];

        $sql = "SELECT COUNT(*) AS totalSeniN FROM solicitud_seniales_nuevas";
        $totalSeniN = pg_fetch_row($obj->consult($sql));
        $SenialN = $totalSeniN[0];
        
        $sql = "SELECT COUNT(*) AS totalReduN FROM solicitud_reductores_nuevos";
        $totalReduN = pg_fetch_row($obj->consult($sql));
        $ReductorN = $totalReduN[0];

        $sql = "SELECT COUNT(*) AS totalVia FROM solicitud_vias_mal_estado ";
        $totalVia= pg_fetch_row($obj->consult($sql));
        $Via = $totalVia[0];
     
        include_once '../view/reportes/grafica.php';
    }
}
?>