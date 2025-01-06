<?php
include_once '../model/Mapa/MapaModel.php';

class MapaController
{
    public function abrirMapa()
    {
        $obj = new MapaModel();
        include_once '../view/mapa/maqueta4.php';
    }

}
?>