<div
    class="mt-5">
    <h3 class="display-4">Solicitud</h3>
</div>
<div class="page-header">
    <h3 class="fw-bold mb-3">Señales</h3>
    <ul class="breadcrumbs mb-3">
        <li class="nav-home">
            <a href="<?php echo getUrl("Solicitud", "Solicitud", "postSolicitud"); ?>">
                <i class="icon-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <!-- <li class="nav-item">
            <a href="#">Señal en mal estado</a>
        </li> -->
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-body">
                <div class="row">
                    <?php

                    foreach($solicitud as $soli){

                    
                    echo "<div class='col-md-6 col-lg-4'>";
                    echo "  <div class='form-group'>";
                    echo "      <label for='categoria_senial_id'>Categoria de la señal</label>";
                    echo "       <p>" .$soli['solicitud_senial_mal_estado_direccion']. "</p>";
                    echo "   </div>";
                    echo "  <div class='form-group'>";
                    echo "      <label for='danio_id'> Daño</label>";
                    // echo "       <p>" .$soli['']. "</p>";
                    echo "  </div>";
                    echo "  <div class='form-group'>";
                    echo "      <label for='solicitud_via_mal_estado_direccion' class='fw-bold'>Direccion via</label>";
                    // echo "       <p>" .$soli['']. "</p>";
                    echo "  </div>";

                    echo "</div>";
                    echo " <div class='col-md-6 col-lg-4'>";
                    echo "    <div class='form-group'>";
                    echo "       <label for='tipo_senal_id'>Tipo de señal</label>";
                    // echo "       <p>" .$soli['']. "</p>";
                    echo "    </div>";
                    echo "    <div class='form-group'>";
                    echo "       <label for=''> Describa el daño</label>";
                    // echo "       <p>" .$soli['']. "</p>";
                    echo "    </div>";
                    echo "</div>";
                    echo "<div class='col-md-6 col-lg-4'>";
                    echo "    <div class='form-group mb-3 d-none' id='senal'>";
                    echo "       <label for=''>Nombre de la señal</label>";
                    // echo "       <p>" .$soli['']. "</p>";
                    echo "    </div>";
                    echo "    <div class='form-group'>";
                    echo "       <label for='image' class='d-block'>Imagen de la señal dañada</label>";
                    // echo "       <p>" .$soli['']. "</p>";
                    echo "    </div>";

                    echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>